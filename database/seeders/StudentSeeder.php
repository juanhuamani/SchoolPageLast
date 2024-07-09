<?php

namespace Database\Seeders;

use App\Models\Course;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $students = [
            ['name' => 'Juan Perez', 'email' => 'juan@student.com', 'password' => bcrypt('juan')],
            ['name' => 'Maria Lopez', 'email' => 'maria@student.com', 'password' => bcrypt('maria')],
            ['name' => 'Carlos Ramirez', 'email' => 'carlos@student.com', 'password' => bcrypt('carlos')],
            ['name' => 'Ana Martinez', 'email' => 'ana@student.com', 'password' => bcrypt('ana')],
        ];

        $courseIds = Course::pluck('id')->toArray();

        foreach ($students as $student) {
            $student = User::create([
                'name' => $student['name'],
                'email' => $student['email'],
                'password' => $student['password'],
            ])->assignRole('student');
            
            $randomCursoIds = array_rand(array_flip($courseIds), 2);
            if (!is_array($randomCursoIds)) {
                $randomCursoIds = [$randomCursoIds];
            }

            $student->courses()->attach($randomCursoIds);
        }
    }
}
