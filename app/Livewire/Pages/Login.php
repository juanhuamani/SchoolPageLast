<?php

namespace App\Livewire\Pages;

use Livewire\Component;
use App\Livewire\Forms\LoginForm as Form;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

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
            Session::flash('error', 'Invalid credentials');
            return back();
        }
        $user= Auth::getProvider()->retrieveByCredentials($credentials);
        Auth::login($user);

        if ($this->form->isVerify()) {
            Session::flash('info', 'Please verify your email');
            return back();
        }
        
        Session::flash('success', 'Welcome back');
        return redirect()->route('home');
    }
}
