<?php

namespace App\Livewire\Courses;

use Livewire\Component;
use App\Models\Attendance;

class AttendanceStudent extends Component
{
    public $course;
    public $selected_users = [];

    public function mount($course)
    {
        $this->course = $course;
    }

    public function rules ()
    {
        return [
            'selected_users' => 'required|array|min:1'
        ];
    }

    public function render()
    {
        $users = $this->course->users()->whereDoesntHave('attendances', function ($query) {
            $query->whereDate('date', now())->where('present', true);
        })->get();
        
        return view('livewire.courses.attendance-student', [
            'users' => $users
        ]);
    }

    public function submit()
    {
        $selectedUsers = $this->selected_users;

        if (empty($selectedUsers)) {
            return ;
        }
        foreach ($selectedUsers as $userId) {
            $attendance = new Attendance();
            $attendance->user_id = $userId;
            $attendance->course_id = $this->course->id;
            $attendance->date = now();
            $attendance->present = true;
            $attendance->save();
        }

        return redirect()->route('courses.attendance', ['name' => $this->course->name]);
    }
}
