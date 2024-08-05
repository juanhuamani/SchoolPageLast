<?php

namespace App\Livewire\Courses;

use Livewire\Component;
use App\Models\Course;
use Illuminate\Support\Facades\Session;

class CreateCourse extends Component
{
    public $name;
    public $description = '<p class="description"></p>';

    protected $rules = [
        'name' => 'required|min:6',
        'description' => 'required|min:10',
    ];

    public function createCourse()
    {
        $this->validate();
        $course = new Course();
        $course->name = $this->name;
        $course->description = $this->description;
        $course->save();

        Session::flash('success', 'Course created successfully');
        return redirect()->route('home');
    }

    public function render()
    {
        return view('livewire.courses.create-course');
    }
}
