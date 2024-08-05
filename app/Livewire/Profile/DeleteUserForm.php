<?php

namespace App\Livewire\Profile;

use App\Models\User;
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
    public function deleteUser()
    {
        $this->validate([
            'password' => 'required|string',
        ]);

        $user = auth()->user();

        if (!auth()->validate([
            'email' => $user->email,
            'password' => $this->password,
        ])) {
            $this->addError('password', 'The provided password is incorrect.');

            return;
        }

        User::find($user->id)->delete();

        return redirect()->route('login');
    }
}
