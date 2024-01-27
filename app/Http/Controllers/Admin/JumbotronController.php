<?php

namespace App\Http\Controllers\Admin;

use App\Models\Jumbotron;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class JumbotronController extends Controller
{
    public function index()
    {
        $jumbotrons = Jumbotron::paginate(10);
        return view('SuperAdmin.jumbotron.index', compact('jumbotrons'));
    }

    public function create()
    {
        return view('SuperAdmin.jumbotron.create');
    }

    public function store(Request $request)
    {
        Jumbotron::create([
            'link' => $request->input('link'),
            'keterangan' => $request->input('keterangan'),
            'teks_button' => $request->input('teks_button'),
            'judul' => $request->input('judul'),
        ]);
        return redirect()->route('jumbotron.index')->with('success', 'Jumbotron berhasil ditambahkan.');
    }

    public function edit(Jumbotron $jumbotron)
    {
        return view('SuperAdmin.jumbotron.edit', compact('jumbotron'));
    }

    public function update(Request $request, Jumbotron $jumbotron)
    {
        // Tambahkan validasi sesuai kebutuhan

        $jumbotron->update([
            'link' => $request->input('link'),
            'keterangan' => $request->input('keterangan'),
            'teks_button' => $request->input('teks_button'),
            'judul' => $request->input('judul'),
        ]);

        return redirect()->route('jumbotron.index')->with('success', 'Jumbotron berhasil diperbarui.');
    }

  public function destroy(Jumbotron $jumbotron)
{
    $jumbotron->delete();

    return redirect()->route('jumbotron.index')->with('success', 'Jumbotron berhasil dihapus.');
}

}

