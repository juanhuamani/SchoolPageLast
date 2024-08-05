<?php

namespace App\Livewire\Dashboard;

use Livewire\Component;
use App\Models\User;

class Teachers extends Component
{
    public function render()
    {
        $user = auth()->user();
        $role = $user->roles->pluck('name')->first();
        $courses = $user->courses->pluck('name');

        $teachers = null ;

        if ($role == 'admin') {
            $teachers = User::role('teacher');
        }

        else{
            $teachers = User::role('teacher')->whereHas('courses', function ($query) use ($courses) {
                $query->whereIn('name', $courses);
            });
        }

        $teachers = $teachers->paginate(4, ['*'], 'teacherPage', null)->withQueryString()->onEachSide(1)->setPageName('teacherPage');

        return view('livewire.dashboard.teachers', compact('teachers'));
    }
}
