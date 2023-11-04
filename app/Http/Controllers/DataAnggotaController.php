<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Anggota;
use Illuminate\Http\Request;
use App\Models\BalasanKomentar;
use Illuminate\Support\Facades\Auth;

class DataAnggotaController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $anggota = $user->anggota;
        return view('admin.index', compact('anggota'));
    }

    public function create()
    {
        return view('admin.index');
    }

    public function edit()
    {
        $user = Auth::user();
        $anggota = $user->anggota;
        $editMode = $anggota ? true : false;
        return view('admin.index', compact('anggota', 'editMode'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_lengkap' => 'nullable|string',
            'jabatan' => 'nullable|string',
            'generasi' => 'nullable|string',
            'alamat' => 'nullable|string',
            'notelfon' => 'nullable|string',
            'motto' => 'nullable|string',
            'deskripsi' => 'nullable|string',
            'foto' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $user = Auth::user();
        $anggota = $user->anggota;

        if (!$anggota) {
            $anggota = new Anggota();
            $anggota->user_id = $user->id;
        }

        if ($request->hasFile('foto')) {
            $image = $request->file('foto');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('uploads', $imageName, 'public');
            $validatedData['foto'] = $imageName;

            $user->foto = $imageName;
            $user->save();
        }

        $anggota->fill($validatedData);
        $anggota->save();

        return response()->json(['success' => true]);
    }

}
