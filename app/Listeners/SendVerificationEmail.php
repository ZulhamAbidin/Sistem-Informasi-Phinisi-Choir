<?php

namespace App\Listeners;

use App\Events\UserStatusChanged;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;
use App\Mail\VerificationEmail;

class SendVerificationEmail
{
    /**
     * Create the event listener.
     */
    use InteractsWithQueue;

    public function handle(UserStatusChanged $event)
    {
        // Logika pengiriman email
        $userEmail = $event->userEmail;

        // Menggunakan Mail untuk mengirim email
        Mail::to($userEmail)->send(new VerificationEmail());

        \Log::info('Email verification sent for user: ' . $userEmail);
    }

    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
}
