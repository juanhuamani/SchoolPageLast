<?php

namespace App\Livewire\Profile;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;


class UpdateProfileInformationForm extends Component
{
    public function render()
    {
        return view('livewire.profile.update-profile-information-form');
    }

    public string $name = '';
    public string $email = '';

    /**
     * Mount the component.
     */
    public function mount(): void
    {
        $this->name = Auth::user()->name;
        $this->email = Auth::user()->email;
    }

    /**
     * Update the profile information for the currently authenticated user.
     */
    public function updateProfileInformation(): void
    {

    }

    /**
     * Send an email verification notification to the current user.
     */
    public function sendVerification(): void
    {
        
    }
}
