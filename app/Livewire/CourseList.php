<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Course;

class CourseList extends Component
{
    public function render()
    {
        $courses = auth()->user()->courses;

        if (auth()->user()->roles->pluck('name')->first() == 'admin') {
            $courses = Course::all();
        }

        return view('livewire.course-list',
            compact('courses')
        );
    }
}               
