<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\VerificationEmail;

class EmailController extends Controller
{
    public function sendTestEmail()
{
    $user = User::find(auth()->id());
    if ($user) {
        Mail::to($user->email)->send(new VerificationEmail());
        return 'Email terkirim!';
    } else {
        return 'Pengguna tidak ditemukan.';
    }
}
}
