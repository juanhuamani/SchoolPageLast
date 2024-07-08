<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\User;
use App\Models\Curso;

class UserTable extends Component
{
    use WithPagination;

    public $searchName = '';
    public $searchEmail = '';
    public $searchCreate = '';
    public $searchRole = '';

    public function updatingSearchName()
    {
        $this->resetPage();
    }

    public function updatingSearchEmail()
    {
        $this->resetPage();
    }

    public function updatingSearchCreate()
    {
        $this->resetPage();
    }

    public function updatingSearchRole()
    {
        $this->resetPage();
    }

    public function render()
    {
        $user = auth()->user();
        $role = $user->roles->pluck('name')->first();
        $cursos = $user->cursos->pluck('name');

        $users = User::query();

        if ($role == 'admin') {
            $users = $users;
        } 
        elseif ($role == 'student') {
            $users->whereHas('roles', function ($query) {
                $query->where('name', 'teacher');
            });
        }

        dd($users->get());

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
