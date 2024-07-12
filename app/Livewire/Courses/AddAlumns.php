<?php

namespace App\Livewire\Courses;

use Livewire\Component;
use App\Models\User;
use Livewire\WithPagination;

class AddAlumns extends Component
{
    use WithPagination;
    public $course;
    public $selected_users = [];
    public $search = '';
    
    public function mount($course)
    {
        $this->course = $course;
    }
    
    public function render()
    {   
        $courseName = $this->course->name;
        $users = User::role('student')
            ->whereDoesntHave('courses', function ($query) use ($courseName) {
                $query->where('name', $courseName);
            })
            ->where('name', 'like', '%' . $this->search . '%')
            ->get();

        return view('livewire.courses.add-alumns', [
            'users' => $users
        ]);
    }

    public function filter(){
        $this->resetPage();
    }

    public function submit()
    {
        $selectedUsers = $this->selected_users; 

        foreach ($selectedUsers as $userId) {
            $user = User::find($userId);
            $user->courses()->attach($this->course->id);
        }

        return redirect()->route('courses', ['name' => $this->course->name]);
    }
}
