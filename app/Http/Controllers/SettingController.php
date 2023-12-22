<?php

namespace App\Http\Controllers;

use App\Models\Setting; // Ubah sesuai nama model setting Anda
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function showRegistrationForm()
{
    $registrationStatus = Setting::value('registration_status');
    
    if (!$registrationStatus) {
        return redirect()->route('home')->with('error', 'Registrasi saat ini ditutup.');
    }

    return view('auth.register');
}
}
