<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class TeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cursos = [
            ['name' => 'Laravel'],
            ['name' => 'Vue.js'],
            ['name' => 'React.js'],
            ['name' => 'Angular'],
        ];

        $teachers = [
            ['name' => 'John Doe', 'email' => 'john@teacher.com', 'password' => bcrypt('john')],
            ['name' => 'Carlos Alberto', 'email' => 'carlos@teacher.com' , 'password' => bcrypt('carlos')],
            ['name' => 'Maria Clara', 'email' => 'maria@teacher.com', 'password' => bcrypt('maria')],
            ['name' => 'Ana Maria', 'email' => 'ana@teacher.com', 'password' => bcrypt('ana')],
        ];

        foreach ($teachers as $index => $teacherData) {
            $teacher = User::create([
                'name' => $teacherData['name'],
                'email' => $teacherData['email'],
                'password' => $teacherData['password'],
            ])->assignRole('teacher');
        
            $courseId = ($index % count($cursos)) + 1;
            $teacher->cursos()->attach($courseId);
        }
    }
}
