<?php

namespace App\Livewire\Courses;

use Livewire\Component;
use App\Helpers\DateHelper;
use App\Models\Attendance as AttendanceModel;
use Livewire\WithPagination;

class Table extends Component
{
    use WithPagination;
    public $course;
    public $weekNumber = 1;
    public $search = '';

    public function filter()
    {
        $this->resetPage();
    }

    public function mount($course )
    {
        $this->course = $course;
    }

    public function render()
    {
        $users = $this->course->users()
            ->where('name', 'like', '%' . $this->search . '%')
            ->get(); 
            
        $week = DateHelper::getWeekFromNumber($this->weekNumber);

        $attendance = [];
        foreach ($users as $user) {
            foreach ($week as $day) {
                $record = AttendanceModel::query()
                    ->where('user_id', $user->id)
                    ->where('course_id',  $this->course->id)
                    ->whereDate('date', $day)
                    ->first();
                    $attendance[$user->id][$day] = $record ? $record->present : false;
            }
        }
        return view('livewire.courses.table' , [
            'users' => $users,
            'week' => $week,
            'attendance' => $attendance,
        ]);
    }
}
