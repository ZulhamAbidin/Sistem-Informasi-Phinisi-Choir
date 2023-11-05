<?php

namespace App\Http\Controllers\Admin;

use App\Models\Anggota;
use Storage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
// use Illuminate\Support\Facades\Storage;

class DataAnggotaController extends Controller
{
    public function index()
    {
        $anggota = Anggota::all();

        return view('SuperAdmin.dataanggota.index', compact('anggota'));
    }

 

    public function create()
{
    return view('SuperAdmin.dataanggota.create');
}


    // public function show($id)
    // {
    //     $anggota = Anggota::find($id);
    //     // return view('SuperAdmin.dataanggota.show', compact('anggota'));
    //     return view('SuperAdmin\dataanggota\show', ['anggota' => $anggota]);
    // }

    public function show($id)
    {
        $anggota = Anggota::find($id); // Mengambil data anggota dari model berdasarkan ID

        if ($anggota) {
            return view('SuperAdmin\dataanggota\show', ['anggota' => $anggota]);
        } else {
            return view('SuperAdmin.dataanggota.create');
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_lengkap' => 'required',
            'jabatan' => 'required',
            'generasi' => 'required',
            'alamat' => 'required',
            'notelfon' => 'required',
            'motto' => 'required',
            'deskripsi' => 'required',
            'foto' => 'required',
        ]);

        $anggota = new Anggota();

        $anggota->nama_lengkap = $request->input('nama_lengkap');
        $anggota->jabatan = $request->input('jabatan');
        $anggota->generasi = $request->input('generasi');
        $anggota->alamat = $request->input('alamat');
        $anggota->notelfon = $request->input('notelfon');
        $anggota->motto = $request->input('motto');
        $anggota->deskripsi = $request->input('deskripsi');


        if ($request->hasFile('foto')) {
            $uploadedFile = $request->file('foto');
            $imageName = time() . '.' . $uploadedFile->getClientOriginalExtension();
            $uploadedFile->storeAs('uploads', $imageName, 'public');
            $anggota->foto = $imageName;
        }

        $anggota->save();

        session()->flash('success', 'Berhasil Mendaftarkan Anggota Baru!');
        return redirect()->route('dataanggota.index');
    }


     public function destroy($id)
    {
        $anggota = Anggota::find($id);

        if (!$anggota) {
            return redirect()
                ->route('dataanggota.index')
                ->with('error', 'data anggota tidak ditemukan.');
        }

        $anggota->delete();

        return redirect()
            ->route('dataanggota.index')
            ->with('success', 'data anggota berhasil dihapus.');
    }

}
