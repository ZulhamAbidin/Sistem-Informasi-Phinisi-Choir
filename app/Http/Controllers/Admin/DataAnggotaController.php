<?php

namespace App\Http\Controllers\Admin;

use Storage;
use App\Models\Anggota;
use DataTables;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class DataAnggotaController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
        $data = Anggota::latest()->get();

        $data->transform(function ($item) {
            $item->foto = asset('storage/uploads/' . $item->foto);
            return $item;
        });

        return DataTables::of($data)->make(true);
    }

        return view('/SuperAdmin/dataanggota/index');

    }

    public function create()
    {
        return view('SuperAdmin.dataanggota.create');
    }

    public function show($id)
    {
        $anggota = Anggota::find($id);

        if ($anggota) {
            return view('SuperAdmin.dataanggota.show', ['anggota' => $anggota]);
        } else {
            return view('SuperAdmin.dataanggota.create');
        }
    }

    public function edit($id)
    {
        $anggota = Anggota::find($id);

        if (!$anggota) {
            return redirect()->route('dataanggota.index')->with('error', 'Anggota tidak ditemukan.');
        }

        return view('SuperAdmin.dataanggota.edit', compact('anggota'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_lengkap' => 'required',
            'nra' => 'required',
            'jabatan' => 'required',
            'generasi' => 'required',
            'alamat' => 'required',
            'notelfon' => 'required',
            'motto' => 'required',
            'deskripsi' => 'required',
            'foto' => '',
        ]);

        $anggota = Anggota::find($id);

        if (!$anggota) {
            return redirect()->route('dataanggota.index')->with('error', 'Anggota tidak ditemukan.');
        }
        
        $anggota->nama_lengkap = $request->input('nama_lengkap');
        $anggota->nra = $request->input('nra');
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

            if ($anggota->foto && $anggota->foto !== 'default.jpg') {
                Storage::disk('public')->delete('uploads/' . $anggota->foto);
            }

            $anggota->foto = $imageName;
        }

        $anggota->save();
        return redirect()->route('dataanggota.index')->with('success', 'Anggota berhasil diperbarui.');
    }


    public function store(Request $request)
    {
        $request->validate([
            'nama_lengkap' => 'required',
            'nra' => 'required',
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
        $anggota->nra = $request->input('nra');
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
        return redirect()->route('dataanggota.index')->with('success', 'Anggota berhasil ditambahkan.');
    }

        public function destroy(Request $request, $id)
    {
        $anggota = Anggota::find($id);

        if (!$anggota) {
            return response()->json(['success' => false, 'message' => 'Anggota tidak ditemukan.']);
        }

        $anggota->delete();

        if ($request->ajax()) {
            return response()->json(['success' => true, 'message' => 'Anggota berhasil dihapus.']);
        } else {
            return redirect()->route('dataanggota.index')->with('success', 'Anggota berhasil dihapus.');
        }
    }
}
