<?php

namespace App\Livewire;

use Livewire\Component;

class CourseList extends Component
{
    public function render()
    {
        $courses = auth()->user()->courses; 

        return view('livewire.course-list',
            compact('courses')
        );
    }
}               
