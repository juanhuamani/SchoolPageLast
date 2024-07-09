<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Factory as ValidationFactory;
use Illuminate\Support\Facades\Hash;

class LoginForm extends Form
{
    public $name;
    public $password;

    public function rules ()
    {
        return [
            'name' => 'required',
            'password' => 'required',
        ];
    }

    public function getCredentials()
    {
        if ($this->isEmail($this->name)) {
            return ['email' => $this->name, 'password' => $this->password];
        }

        return ['user' => $this->name, 'password' =>$this->password];
    }

    public function isEmail($value)
    {
        return filter_var($value, FILTER_VALIDATE_EMAIL);
    }

    public function isVerify(){
        return auth()->user()->email_verified_at == null;
    }
}
