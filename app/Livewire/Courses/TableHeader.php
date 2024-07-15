<?php

namespace App\Livewire\Courses;

use Livewire\Component;

class TableHeader extends Component
{
    public $week;
    
    public function render()
    {
        return view('livewire.courses.table-header');
    }
}
