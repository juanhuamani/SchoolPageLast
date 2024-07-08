<?php

namespace App\Livewire\Pages;

use Livewire\Component;
use App\Livewire\Forms\RegisterForm as Form;

class Register extends Component
{
    public Form $form;

    public function render()
    {
        return view('livewire.pages.register');
    }

    public function register()
    {
        $this->form->validate();
        $this->form->register();
    }
} 
