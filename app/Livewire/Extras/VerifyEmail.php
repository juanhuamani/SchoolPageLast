<?php

namespace App\Livewire\Extras;

use Livewire\Component;
use App\Models\User;

class VerifyEmail extends Component
{
    public function verifyEmail($user)
    {
        $user = User::where('remember_token', $user)->first();   

        if($user){
            if($user->email_verified_at == null){
                $user->email_verified_at = now();
                $user->save();
                return redirect()->route('login')->with('success', 'Email verified successfully');
            }
            return redirect()->route('login')->with('error', 'Email already verified');
        }
        return redirect()->route('login')->with('error', 'Invalid token');
    }
}
