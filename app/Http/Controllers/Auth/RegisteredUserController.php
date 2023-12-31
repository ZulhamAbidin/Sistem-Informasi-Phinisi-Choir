<?php

namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
public function store(Request $request)
{
    $request->validate([
        'nama_lengkap' => ['required', 'string', 'max:255'],
        'nra' => ['required', 'string', 'max:255', 'unique:users'],
        'password' => ['required', 'confirmed', Rules\Password::defaults()],
    ], [
        'nra.unique' => 'NRA sudah digunakan oleh pengguna lain.',
        'password.confirmed' => 'Konfirmasi password tidak cocok.',
    ]);

    $user = User::create([
        'nama_lengkap' => $request->nama_lengkap,
        'nra' => $request->nra,
        'password' => Hash::make($request->password),
        'role' => 'admin',
        'status' => 'belum_terverifikasi',
    ]);

    event(new Registered($user));

    Auth::login($user);

    return redirect(route('login'));
}


//     public function store(Request $request): RedirectResponse
// {
//     $request->validate([
//         'nama_lengkap' => ['required', 'string', 'max:255'],
//         'nra' => ['required', 'string', 'max:255', 'unique:users'],
//         'password' => ['required', 'confirmed', Rules\Password::defaults()],
//     ]);

//     $user = User::create([
//         'nama_lengkap' => $request->nama_lengkap,
//         'nra' => $request->nra,
//         'password' => Hash::make($request->password),
//         'role' => 'admin',
//         'status' => 'belum_terverifikasi',
//     ]);

//     event(new Registered($user));

//     Auth::login($user);

//     return redirect(route('login'));
// }

}
