<?php

namespace App\Livewire\Profile;

use App\Models\User;
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
    public function updateProfileInformation()
    {
        $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
        ]);

        $user = User::find(Auth::id());

        $user->update([
            'name' => $this->name,
            'email' => $this->email,
        ]);

        return redirect()->route('profile');
    }

}
