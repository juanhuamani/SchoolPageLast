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
        $cursos = [
            ['name' => 'Laravel'],
            ['name' => 'Vue.js'],
            ['name' => 'React.js'],
            ['name' => 'Angular'],
        ];

        foreach ($cursos as $curso) {
            Course::create([
                'name' => $curso['name'],
            ]);
        }
    }
}
