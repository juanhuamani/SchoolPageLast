<?php

namespace App\Livewire\Profile;

use Livewire\Component;
class UpdatePasswordForm extends Component
{
    public function render()
    {
        return view('livewire.profile.update-password-form');
    }

    public string $current_password = '';
    public string $password = '';
    public string $password_confirmation = '';

    /**
     * Update the password for the currently authenticated user.
     */
    public function updatePassword(): void
    {
    }
}
