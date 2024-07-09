<?php

namespace App\Livewire\Extras;

use Exception;
use Livewire\Component;
use App\Mail\SendVerifyEmail;
use Illuminate\Support\Facades\Mail;

class ContactEmail extends Component
{
    public static function sendMail($name , $email , $token)
    {
        try {
            Mail::to($email)->send(new SendVerifyEmail($name , $email , $token));
            return ['success' => 'Email sent successfully'];
        } catch (Exception $e) {
            return ['error' => $e->getMessage() ];
        }
    }
}
