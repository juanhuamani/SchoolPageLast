<?php

namespace App\Livewire\Dashboard;

use App\Models\Course;
use Livewire\Component;

class Courses extends Component
{
    public function render()
    {
        $role = auth()->user()->roles->pluck('name')->first();
        $courses = Course::query();

        if ($role == 'admin') {
            $courses = $courses->get();
        } else {
            $courses = $courses->whereHas('users', function ($query) {
                $query->where('user_id', auth()->id());
            })->get();
        }

        return view('livewire.dashboard.courses' , compact('courses'));
    }
} 
