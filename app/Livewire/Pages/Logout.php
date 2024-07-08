<?php

namespace App\Livewire\Pages;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;


class Logout extends Component
{
    public function logout()
    {
        Session::flush();
        Auth::logout();
        return redirect('/login')->with('success', 'User logged out successfully');
    }
}
