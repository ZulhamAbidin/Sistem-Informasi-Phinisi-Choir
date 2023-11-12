<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\ProfileUpdateRequest;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        $user = $request->user();

        return view('profile.edit', [
            'user' => [
                'nra' => $user->nra,
                'nama_lengkap' => $user->nama_lengkap,
                'password' => '', // Kosongkan password untuk alasan keamanan
            ],
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        try {
            $user = $request->user();

            // Pastikan role dan status tidak dimodifikasi
            $userData = $request->only(['nama_lengkap', 'password', 'nra']);

            // Validasi NRA unik
            $request->validate([
                'nra' => 'unique:users,nra,' . $user->id,
            ]);

            // Kosongkan kolom foto
            $userData['foto'] = null;

            // Update data pengguna
            $user->fill($userData);

            // Hash password jika ada perubahan
            if ($request->has('password')) {
                $user->password = Hash::make($request->password);
            }

            $user->save();

            // Logout user setelah berhasil memperbarui profil
            Auth::logout();

            Alert::success('Berhasil', 'Profile berhasil diperbarui. Anda telah logout secara otomatis.');
            return redirect()->route('welcome');
        } catch (\Exception $e) {
            // Tangkap dan laporkan kesalahan
            \Log::error('Error updating profile: ' . $e->getMessage());

            Alert::error('Error', 'Terjadi kesalahan saat memperbarui profil.');
            return redirect()->route('profile.edit');
        }
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
