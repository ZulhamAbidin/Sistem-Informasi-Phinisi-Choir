<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Events\UserStatusChanged;
use Illuminate\Support\Facades\Mail;
use App\Mail\VerificationEmail;

class ApprovalController extends Controller
{
    public function index()
    {
        $loggedInUser = Auth::user();
        $users = User::where('status', 'belum_terverifikasi')
            ->where('id', '!=', $loggedInUser->id)
            ->get();

        return view('SuperAdmin.manajemenuser.index', compact('users'));
    }

    public function toggleRegistrationStatus(Request $request)
    {
        try {
            // Temukan setting dengan kunci 'registration_status'
            $registrationSetting = Setting::where('key', 'registration_status')->first();

            // Ubah status registrasi
            if ($registrationSetting) {
                $newStatus = $registrationSetting->value === '1' ? '0' : '1';
                $registrationSetting->value = $newStatus;
                $registrationSetting->save();

                return response()->json(['new_status' => $newStatus]);
            } else {
                return response()->json(['error' => 'Tidak dapat menemukan pengaturan status registrasi.'], 404);
            }
        } catch (\Exception $e) {
            return response()->json(['error' => 'Terjadi kesalahan saat mengubah status registrasii.'], 500);
        }
    }

    // public function updateStatus(Request $request, User $user)
    // {
    //     $request->validate([
    //         'status' => 'required|in:belum_terverifikasi,terverifikasi',
    //     ]);

    //     $user->update(['status' => $request->status]);

    //     return response()->json(['success' => true]);
    // }
    public function updateStatus(Request $request, User $user)
{
    $request->validate([
        'status' => 'required|in:belum_terverifikasi,terverifikasi',
    ]);

    $user->update(['status' => $request->status]);

    // Pemanggilan event UserStatusChanged setelah status diubah
    event(new \App\Events\UserStatusChanged($user));

    return response()->json(['success' => true]);
}

}
