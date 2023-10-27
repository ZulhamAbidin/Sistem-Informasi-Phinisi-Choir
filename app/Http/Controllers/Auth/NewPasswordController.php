<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class NewPasswordController extends Controller
{
    /**
     * Display the password reset view.
     */
    public function create(Request $request): View
    {
        return view('auth.reset-password', ['request' => $request]);
    }

    /**
     * Handle an incoming new password request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'token' => ['required'],
            'nra' => ['required', 'string'], // Ganti 'email' menjadi 'nra'
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        // Di dalam fungsi Password::reset, kami mengganti 'email' dengan 'nra' dan menggunakan 'nra' sebagai kolom referensi.
        $status = Password::reset(
            $request->only('nra', 'password', 'password_confirmation', 'token'),
            function ($user) use ($request) {
                $user->forceFill([
                    'password' => Hash::make($request->password),
                    'remember_token' => Str::random(60),
                ])->save();

                event(new PasswordReset($user));
            }
        );

        // Jika kata sandi berhasil direset, kita akan mengarahkan pengguna kembali ke tampilan login aplikasi yang sudah diautentikasi. Jika ada kesalahan, kita dapat mengarahkan mereka kembali ke halaman asal dengan pesan kesalahan.
        return $status == Password::PASSWORD_RESET
            ? redirect()->route('login')->with('status', __($status))
            : back()->withInput($request->only('nra'))
                ->withErrors(['nra' => __($status)]);
    }
}
