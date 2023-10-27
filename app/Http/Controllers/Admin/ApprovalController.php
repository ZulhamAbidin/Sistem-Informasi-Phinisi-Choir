<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ApprovalController extends Controller
{
   public function index()
{
    // Mendapatkan pengguna yang sedang login
    $loggedInUser = Auth::user();

    // Mendapatkan semua pengguna dengan status "belum_terverifikasi" kecuali pengguna yang sedang login
    $users = User::where('status', 'belum_terverifikasi')
        ->where('id', '!=', $loggedInUser->id)
        ->get();

    return view('SuperAdmin.manajemenuser.index', compact('users'));
}

    public function updateStatus(Request $request, User $user)
    {
        $request->validate([
            'status' => 'required|in:belum_terverifikasi,terverifikasi',
        ]);

        $user->update(['status' => $request->status]);

        return response()->json(['success' => true]);
    }
}
