<?php

namespace App\Livewire\Courses;

use Livewire\Component;
use App\Models\User;
use Livewire\WithPagination;

class CoursesTable extends Component
{
    use WithPagination;

    public $searchName = '';
    public $searchEmail = '';
    public $searchCreate = '';
    public $searchRole = '';
    public $course = '';

    public function filter()
    {
        $this->resetPage();
    }

    public function mount($course)
    {
        $this->course = $course;
    }

    public function render()
    {
        $user = auth()->user();
        $role = $user->roles->pluck('name')->first();

        $users = User::query();

        if ($role == 'admin') {
            $users = $users->whereHas('courses', function ($query) {
                $query->where('name', $this->course);
            });
        } else{
            $users = $users->role('student')->whereHas('courses', function ($query) {
                $query->where('name', $this->course);
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
            ->paginate(10)->withQueryString();

        return view('livewire.courses.courses-table', [
            'users' => $users,
        ]);
    }
}
