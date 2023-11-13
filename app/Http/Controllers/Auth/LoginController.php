<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Events\RoleChanged;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }


  public function login(Request $request)
{
    $request->validate([
        'nra' => 'required',
        'password' => 'required',
    ]);

    $credentials = $request->only('nra', 'password');

    // Ambil pengguna berdasarkan NRA
    $user = User::where('nra', $credentials['nra'])->first();

    if ($user) {
        if ($user->status === 'terverifikasi' && Auth::attempt($credentials)) {
            if ($user->role === 'admin') {
                return redirect()->route('admin.index');
            } elseif ($user->role === 'super_admin') {
                return redirect()->route('admin.dashboard');
            }
        } elseif ($user->status === 'belum_terverifikasi') {
            return redirect()->route('login')->with('error', 'Admin belum mengkonfirmasi pendaftaran Anda sebagai anggota');
        }
    }

    return redirect()
        ->route('login')
        ->with('error', 'Login gagal. NRA dan Password Tidak Sesuai');
}



    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

}
