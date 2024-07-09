<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\User;

class UserTable extends Component
{
    use WithPagination;

    public $searchName = '';
    public $searchEmail = '';
    public $searchCreate = '';
    public $searchRole = '';

    public function filter()
    {
        $this->resetPage();
    }

    public function render()
    {
        $user = auth()->user();
        $role = $user->roles->pluck('name')->first();
        $courses = $user->courses->pluck('name');

        $users = null ;

        if ($role == 'admin') {
            $users = User::query();
        } 
        elseif ($role == 'student') {
            $users = User::role('teacher')->whereHas('courses', function ($query) use ($courses) {
                $query->whereIn('name', $courses);
            });
        }
        elseif ($role == 'teacher') {
            $users = User::role('student')->whereHas('courses', function ($query) use ($courses) {
                $query->whereIn('name', $courses);
            });
        }

        $users = $users
            ->when($this->searchName, function ($query) {
                $query->where('name', 'like', '%' . $this->searchName . '%');
            })
            ->when($this->searchEmail, function ($query) {
                $query->where('email', 'like', '%' . $this->searchEmail . '%');
            })
            ->when($this->searchCreate, function ($query) {
                $query->where('created_at', 'like', '%' . $this->searchCreate . '%');
            })
            ->when($this->searchRole, function ($query) {
                $query->whereHas('roles', function ($query) {
                    $query->where('name', 'like', '%' . $this->searchRole . '%');
                });
            })
            ->get();

        return view('livewire.user-table', [
            'users' => $users,
        ]);
    }
}
