<?php

namespace App\Livewire\Profile;

use Livewire\Component;
use Illuminate\Auth\Events\Logout;

class DeleteUserForm extends Component
{
    public function render()
    {
        return view('livewire.profile.delete-user-form');
    }

    public string $password = '';

    /**
     * Delete the currently authenticated user.
     */
    public function deleteUser(Logout $logout): void
    {
        
    }
}
