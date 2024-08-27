<?php

namespace App\Services;

use Illuminate\Support\Facades\Mail;

class MailService
{
    public function mailRegister($userData)
    {
        // Implementa el envío de correo electrónico aquí
        Mail::to($userData['email'])->send(new \App\Mail\RegisterMail($userData));
    }
}
