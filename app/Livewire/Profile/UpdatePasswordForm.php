<?php

namespace App\Livewire\Profile;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Hash;
class UpdatePasswordForm extends Component
{
    public function render()
    {
        return view('livewire.profile.update-password-form');
    }

    public string $current_password = '';
    public string $password = '';
    public string $password_confirmation = '';

    public function rules(): array
    {
        return [
            'current_password' => ['required', 'string'],
            'password' => ['required', 'string', 'confirmed'],
            'password_confirmation' => ['required', 'string' , 'same:password'],
        ];
    }

    public function updatePassword()
    {
        // Obtener el usuario autenticado
        $user = User::find(auth()->id());

        // Verificar si la contraseña actual es correcta
        if ($user && Hash::check($this->current_password, $user->password)) {
            $user->update([
                'password' => bcrypt($this->password),
            ]);

            return redirect()->route('home');
        } else {
            $this->addError('password', 'Your current password is incorrect.');
        }
    }
}
