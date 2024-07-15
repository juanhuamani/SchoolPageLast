<?php

namespace App\Livewire\Pages;

use Livewire\Component;
use App\Models\Course;
use App\Helpers\DateHelper;
use App\Models\Attendance as AttendanceModel;

class Attendance extends Component
{
    public function render($courseName)
    {
        $course = Course::where('name', $courseName)->first();

        return view('livewire.pages.attendance', [
            'course' => $course,
        ]);
    }
}
