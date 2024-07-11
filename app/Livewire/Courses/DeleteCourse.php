<?php

namespace App\Livewire\Courses;

use Livewire\Component;
use App\Models\Course;

class DeleteCourse extends Component
{
    public $course;
    public $courseName;
    public $courseconfirm;

    protected $rules = [
        'courseconfirm' => 'required|string|same:courseName',
    ];

    public function mount($course)
    {
        $this->course = $course;
        $this->courseName = $course->name;
    }

    public function deleteCourse() {
        $this->validate();
        Course::find($this->course->id)->delete();

        return redirect()->route('home');
    }

    public function render()
    {
        return view('livewire.courses.delete-course');
    }
} 
