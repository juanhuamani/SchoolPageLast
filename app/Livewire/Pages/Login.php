<?php

namespace App\Livewire\Pages;

use Livewire\Component;
use App\Livewire\Forms\LoginForm as Form;
use Illuminate\Support\Facades\Auth;

class Login extends Component
{

    public Form $form;
    public function render()
    {
        return view('livewire.pages.login');
    }

    public function login()
    {
        $this->form->validate();
        $credentials = $this->form->getCredentials();
        if (!Auth::validate($credentials)) {
            return back()->with('error', 'Invalidate credentials');
        }
        $user= Auth::getProvider()->retrieveByCredentials($credentials);
        Auth::login($user);

        return redirect('/');
    }
}
