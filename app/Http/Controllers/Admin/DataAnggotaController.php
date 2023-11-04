<?php

namespace App\Http\Controllers\Admin;

use App\Models\Anggota;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DataAnggotaController extends Controller
{
    public function index()
    {
        $anggota = Anggota::all(); // Mengambil semua data anggota dari model
        return view('SuperAdmin.dataanggota.index', compact('anggota'));
    }
        
    public function show($id)
    {
        $anggota = Anggota::find($id); // Mengambil data anggota berdasarkan ID yang diberikan
        return view('SuperAdmin.dataanggota.show', compact('anggota'));
    }

}
