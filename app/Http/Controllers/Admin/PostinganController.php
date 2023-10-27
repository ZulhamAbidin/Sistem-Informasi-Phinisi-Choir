<?php

namespace App\Http\Controllers\Admin;

use Storage;
use Carbon\Carbon;
use App\Models\Postingan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session; 

class PostinganController extends Controller
{
    public function index()
    {
        $postingans = Postingan::all();
        $postingans->transform(function ($postingan) {
            $postingan->selisihWaktu = Carbon::parse($postingan->created_at)->diffForHumans();
            return $postingan;
        });
        return view('SuperAdmin.postingan.index', compact('postingans'));
    }

    public function create()
    {
        return view('SuperAdmin.postingan.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'judul_postingan' => 'required',
            'deskripsi' => 'required',
            'lokasi' => 'required',
            'kategori' => 'required',
            'sumber' => 'required',
        ]);

        $imageName = null;
        $supportImageNames = [];

        if ($request->hasFile('sampul')) {
            $image = $request->file('sampul');
            $imageName = time() . '.' . $image->extension();
            $image->storeAs('uploads', $imageName, 'public');
        }

        if ($request->hasFile('gambar_pendukung')) {
            $supportImageNames = []; 

            foreach ($request->file('gambar_pendukung') as $supportImage) {
                $supportImageName = time() . '_' . uniqid() . '_support.' . $supportImage->extension();
                $supportImage->storeAs('uploads', $supportImageName, 'public');
                $supportImageNames[] = $supportImageName;
            }
        } else {
            $supportImageNames = []; 
        }

        $postingan = new Postingan([
            'judul_postingan' => $request->input('judul_postingan'),
            'deskripsi' => $request->input('deskripsi'),
            'kategori' => $request->input('kategori'),
            'lokasi' => $request->input('lokasi'),
            'jumlah_suka' => 0,
            'sumber' => $request->input('sumber'),
            'sampul' => $imageName,
            'gambar_pendukung' => implode(',', $supportImageNames), 
        ]);

        $postingan->save();

        session()->flash('success', 'Postingan berhasil disimpan!');

        return redirect()->route('admin.postingan.index');
    }

    public function show($id)
    {
        $postingan = Postingan::find($id);

        if (!$postingan) {
            return redirect()->route('admin.postingan.index');
        }

        $postingan->selisihWaktu = Carbon::parse($postingan->created_at)->diffForHumans();

        return view('SuperAdmin.postingan.show', compact('postingan'));
    }

    public function edit($id)
{
    $postingan = Postingan::find($id);

    if (!$postingan) {
        return redirect()
            ->route('admin.postingan.index')
            ->with('error', 'Postingan tidak ditemukan.');
    }

    return view('SuperAdmin.postingan.edit', compact('postingan'));
}

    public function update(Request $request, $id)
{
    $this->validate($request, [
        'judul_postingan' => 'required',
        'deskripsi' => 'required',
        'lokasi' => 'required',
        'kategori' => 'required',
        'sumber' => 'required',
    ]);

    $postingan = Postingan::find($id);

    if (!$postingan) {
        return redirect()->route('admin.postingan.index');
    }

    if ($request->hasFile('sampul')) {
        Storage::disk('public')->delete('uploads/' . $postingan->sampul);

        $image = $request->file('sampul');
        $imageName = time() . '.' . $image->extension();
        $image->storeAs('uploads', $imageName, 'public');

        $postingan->sampul = $imageName;
    }

    if ($request->hasFile('gambar_pendukung')) {
        $supportImageNames = [];

        foreach ($request->file('gambar_pendukung') as $supportImage) {
            $supportImageName = time() . '_' . uniqid() . '_support.' . $supportImage->extension();
            $supportImage->storeAs('uploads', $supportImageName, 'public');
            $supportImageNames[] = $supportImageName;
        }

        $oldSupportImages = explode(',', $postingan->gambar_pendukung);
        foreach ($oldSupportImages as $oldImage) {
            Storage::disk('public')->delete('uploads/' . $oldImage);
        }

        $postingan->gambar_pendukung = implode(',', $supportImageNames);
    }
    $postingan->judul_postingan = $request->input('judul_postingan');
    $postingan->deskripsi = $request->input('deskripsi');
    $postingan->kategori = $request->input('kategori');
    $postingan->lokasi = $request->input('lokasi');
    $postingan->sumber = $request->input('sumber');
    $postingan->save();

    return redirect()->route('admin.postingan.index')->with('success', 'Postingan berhasil diperbarui!');
}

 public function destroy($id)
    {
        $postingans = Postingan::find($id);

        if (!$postingans) {
            return redirect()
                ->route('admin.postingan.index')
                ->with('error', 'postingan tidak ditemukan.');
        }

        $postingans->delete();

        return redirect()
            ->route('admin.postingan.index')
            ->with('success', 'postingan berhasil dihapus.');
    }

}
