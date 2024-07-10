<?php

namespace App\Livewire\Pages;

use Livewire\Component;
use App\Models\Course;
use App\Models\User;

class Courses extends Component
{
    public function render($name)
    {
        $course = Course::where('name', $name)->first();

        return view('livewire.pages.courses', [
            'course' => $course
        ]);
    }

    public function edit($name)
    {
        $course = Course::where('name', $name)->first();

        return view('livewire.pages.edit-course', [
            'course' => $course
        ]);
    }
}
