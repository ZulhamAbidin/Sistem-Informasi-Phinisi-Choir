<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class VerifyUserStatus
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
{
    if (auth()->check() && auth()->user()->status === 'belum_terverifikasi') {
        // Jika status "belum_terverifikasi," arahkan pengguna ke halaman login dengan pesan kesalahan.
        auth()->logout();
        return redirect()->route('login')->with('error', 'Regfistrasi Berhasil Silahkan Hubungi Admin Untuk Mengkonfirmasi Pendaftaran Anda');
    }

    return $next($request);
}

}
