<?php

namespace App\Livewire\Courses;

use Livewire\Component;
use App\Models\Course;

class UpdateCourse extends Component
{
    public function render()
    {
        return view('livewire.courses.update-course');
    }

    protected function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:65535',
        ];
    }

    public string $name = '';
    public string $description = '';
    public $courseid = 0;

    /**
     * Mount the component.
     */
    public function mount($name , $description , $id): void {
        $this->name = $name;
        $this->description = $description;
        $this->courseid = $id;
    }

    public function updateCourse() {
        $this->validate();
        $course = Course::find($this->courseid);

        if($course && $this->name && $this->description) {
            $course->name = $this->name;
            $course->description = $this->description;
            $course->save();

            return redirect()->route('courses',['name' => $this->name]);
        }
        return redirect()->route('courses.edit',['name' => $this->name]);
    }
}
