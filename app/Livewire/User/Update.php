<?php

namespace App\Livewire\User;

use Livewire\Component;

class Update extends Component
{
    public $user;
    public $name = '';
    public $email = '';


    public function mount($user){
        $this->user = $user;
        $this->name = $user->name;
        $this->email = $user->email;
    }

    public function render()
    {
        return view('livewire.user.update' , [
            'user' => $this->user
        ]);
    }

    public function update(){
        $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
        ]);

        $this->user->update([
            'name' => $this->name,
            'email' => $this->email,
        ]);

        return redirect()->route('dashboard');
    }
}
