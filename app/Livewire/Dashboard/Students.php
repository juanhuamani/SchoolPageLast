<?php

namespace App\Livewire\Dashboard;

use Livewire\Component;
use App\Models\User;
use WithPagination;

class Students extends Component
{
    public $studentsPage = 1; 

    public function render()
    {
        $user = auth()->user();
        $role = $user->roles->pluck('name')->first();
        $courses = $user->courses->pluck('name');

        $students = null;
        if ($role == 'admin') {
            $students = User::role('student');
        } else {
            $students = User::role('student')->whereHas('courses', function ($query) use ($courses) {
                $query->whereIn('name', $courses);
            });
        }

        $students = $students->paginate(4, ['*'], 'studentsPage', null)->withQueryString()->onEachSide(1)->setPageName('studentsPage');

        return view('livewire.dashboard.students', compact('students'));
    }

}
