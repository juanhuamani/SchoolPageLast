<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Course;

class CursoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $courses = [
            ['name' => 'Laravel'],
            ['name' => 'Vue.js'],
            ['name' => 'React.js'],
            ['name' => 'Angular'],
        ];

        foreach ($courses as $course) {
            Course::create([
                'name' => $course['name'],
            ]);
        }
    }
}
