<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Course;
use App\Models\User;
use App\Models\Attendance;
use App\Helpers\DateHelper;

class AttendanceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $courses = Course::all();
        $users = User::all();

        $week = DateHelper::getWeekFromNumber(1);

        foreach ($courses as $course) {
            foreach ($users as $user) {
                foreach ($week as $day) {
                    Attendance::create([
                        'course_id' => $course->id,
                        'user_id' => $user->id,
                        'present' => rand(0, 1),
                        'date' => $day,
                    ]);
                }
            }
        }
    }
}
