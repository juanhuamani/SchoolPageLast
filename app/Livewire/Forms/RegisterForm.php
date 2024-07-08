<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class RegisterForm extends Form
{
    public $name = '';
    public $email = '';
    public $password = '';
    public $role = '';

    public function rules()
    {
        return [
            'name' => 'required|string|min:3',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:5',
            'role' => 'required|in:admin,teacher,student',
        ];
    }

    public function register()
    {
        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' =>bcrypt($this->password),
            'remember_token' => Str::random(20),
        ]);

        $user->assignRole($this->role);
        return redirect()->route('login')->with('success', 'You have been registered successfully!');
    }
}
