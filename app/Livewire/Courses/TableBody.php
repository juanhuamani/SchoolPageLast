<?php

namespace App\Livewire\Courses;

use Livewire\Component;

class TableBody extends Component
{
    public $users;
    public $week;
    public $attendance;
    
    public function render()
    {
        return view('livewire.courses.table-body');
    }
}
