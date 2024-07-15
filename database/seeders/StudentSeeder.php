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
        $predefinedStudents = [
            ['name' => 'Juan Perez', 'email' => 'juan@student.com', 'password' => bcrypt('juan')],
            ['name' => 'Maria Lopez', 'email' => 'maria@student.com', 'password' => bcrypt('maria')],
            ['name' => 'Carlos Ramirez', 'email' => 'carlos@student.com', 'password' => bcrypt('carlos')],
            ['name' => 'Ana Martinez', 'email' => 'ana@student.com', 'password' => bcrypt('ana')],
        ];
        
        $numberOfAdditionalStudents = 20;
        $courseIds = Course::pluck('id')->toArray();
        
        $students = $predefinedStudents;
        
        for ($i = 1; $i <= $numberOfAdditionalStudents; $i++) {
            $students[] = [
                'name' => 'Student' . $i,
                'email' => 'student' . $i . '@student.com',
                'password' => bcrypt('password' . $i),
            ];
        }
        
        foreach ($students as $studentData) {
            $student = User::create([
                'name' => $studentData['name'],
                'email' => $studentData['email'],
                'password' => $studentData['password'],
                'email_verified_at' => now(),
            ])->assignRole('student');
        
            $numberOfCourses = rand(1, 2); 
            $randomCursoIds = array_rand(array_flip($courseIds), $numberOfCourses);
            if (!is_array($randomCursoIds)) {
                $randomCursoIds = [$randomCursoIds];
            }
        
            $student->courses()->attach($randomCursoIds);
        }
    }
}
