<?php

namespace App\Livewire\Dashboard;

use App\Models\User;
use Livewire\Component;

class DeleteUsers extends Component
{
    public $user;


    public function mount($user)
    {
        $this->user = $user;
    }

    public function render()
    {
        return view('livewire.dashboard.delete-users' , [
            'user' => $this->user
        ]);
    }

    public function deleteUser()
    {
        User::find($this->user->id)->delete();
        return redirect()->route('dashboard');
    }
}
