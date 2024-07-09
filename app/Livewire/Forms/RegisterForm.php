<?php

namespace App\Livewire\Forms;

use Livewire\Form;
use App\Models\User;
use App\Models\Course;
use App\Livewire\Extras\ContactEmail;
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
            'role' => 'required|string|in:admin,student,teacher',
        ];
    }

    public function register()
    {
        $courseIds = Course::pluck('id')->toArray();

        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' =>bcrypt($this->password),
            'remember_token' => Str::random(20),
        ]);

        $verifyEmail = ContactEmail::sendMail($this->name , $this->email , $user->remember_token);

        if (isset($verifyEmail['success'])) {
            $user->assignRole($this->role);
            if($this ->role == 'admin'){
                $user->courses()->sync($courseIds);
            }
            return redirect()->route('login')->with('success', 'You have been registered successfully!');
        } else {
            $user->delete();
            return redirect()->route('register')->with('error', $verifyEmail['error']);
        }
    }

}
