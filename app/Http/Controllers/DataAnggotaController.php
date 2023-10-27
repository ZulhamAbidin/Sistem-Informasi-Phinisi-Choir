<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Users;
use App\Models\Anggota;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DataAnggotaController extends Controller
{
    public function index()
{
    // Mendapatkan user yang sedang login
    $user = Auth::user();

    // Mengambil data anggota yang berelasi dengan user yang sedang login
    $anggota = $user->anggota;

    return view('admin.index', compact('anggota'));
}



    public function create()
    {
        return view('admin.index');
    }
public function edit()
{
    // Mendapatkan user yang sedang login
    $user = Auth::user();

    // Mengambil data anggota yang berelasi dengan user yang sedang login
    $anggota = $user->anggota;

    // Tentukan nilai $editMode berdasarkan kondisi edit atau tambah
    $editMode = $anggota ? true : false;

    // Mengirim data anggota dan $editMode ke tampilan edit
    return view('admin.index', compact('anggota', 'editMode'));
}


    public function store(Request $request)
    {
        // Validasi data yang diterima dari formulir
        $validatedData = $request->validate([
            'nama_lengkap' => 'nullable|string',
            'jabatan' => 'nullable|string',
            'generasi' => 'nullable|string',
            'alamat' => 'nullable|string',
            'notelfon' => 'nullable|string',
            'motto' => 'nullable|string',
            'deskripsi' => 'nullable|string',
            'foto' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Aturan pengunggahan gambar
        ]);

        // Cari data anggota yang terkait dengan pengguna yang sedang login
        $user = Auth::user();
        $anggota = $user->anggota;

        if (!$anggota) {
            // Jika pengguna belum memiliki data anggota, buat yang baru
            $anggota = new Anggota();
        }

        // Simpan gambar jika ada
        if ($request->hasFile('foto')) {
            $image = $request->file('foto');
            $imageName = time() . '.' . $image->extension();
            $image->storeAs('uploads', $imageName, 'public'); // Sesuaikan dengan nama penyimpanan yang Anda inginkan, dalam hal ini "public"
            $validatedData['foto'] = $imageName;
        }

        // Isi data anggota dengan input yang valid
        $anggota->fill($validatedData);

        // Hubungkan anggota dengan pengguna yang sedang login
        $anggota->user_id = $user->id;

        // Simpan data anggota ke dalam database
        $anggota->save();

        return response()->json(['success' => true]);
    }

    
}
