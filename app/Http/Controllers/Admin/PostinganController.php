<?php

namespace App\Http\Controllers\Admin;

use Storage;
use Carbon\Carbon;
use App\Models\Postingan;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use RealRashid\SweetAlert\Facades\Alert;

class PostinganController extends Controller
{
    public function index()
{
    $postingans = Postingan::orderBy('created_at', 'desc')->paginate(3);

    // Transformasi jika diperlukan
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
            'sampul' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Atur validasi untuk sampul
            'gambar_pendukung.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Atur validasi untuk gambar pendukung
            'sampai_dengan_tanggal' => 'nullable|date', // Tambahkan validasi untuk tanggal
            'highlights' => Rule::in(['on']), // Atur validasi untuk highlights
        ]);

        // Perbaikan pada penggunaan libxml_use_internal_errors
        libxml_use_internal_errors(true);

        // Menggunakan input 'deskripsi' untuk memperoleh konten HTML dari Summernote
        $dom = new \DOMDocument();
        $dom->loadHTML($request->input('deskripsi'), LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);

        $images = $dom->getElementsByTagName('img');

        foreach ($images as $key => $img) {
            $src = $img->getAttribute('src');

            if ($src) {
                $srcParts = explode(',', $src);

                if (isset($srcParts[1])) {
                    $data = base64_decode($srcParts[1]);
                    $image_name = 'uploads/' . time() . $key . '.png';
                    Storage::put($image_name, $data);
                    $img->removeAttribute('src');
                    $img->setAttribute('src', asset('storage/' . $image_name));
                }
            }
        }

        // Tangani validasi setelah parsing HTML
        $validator = \Validator::make($request->all(), [
            'deskripsi' => 'required',
        ]);

        if ($validator->fails()) {
            // Tampilkan pesan kesalahan
            $errors = libxml_get_errors();
            foreach ($errors as $error) {
                echo $error->message;
            }
            libxml_clear_errors();
            libxml_use_internal_errors(false);

            // Kembalikan respons dengan pesan kesalahan validasi
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $imageName = null;
        $supportImageNames = [];

           // Proses untuk sampul utama
        if ($request->hasFile('sampul')) {
            $image = $request->file('sampul');
            $imageName = time() . '_' . Str::slug($request->input('judul_postingan')) . '.' . $image->extension();
            $image->storeAs('uploads', $imageName, 'public'); // Perhatikan parameter 'public' di sini
        }

        // Proses untuk gambar pendukung
        if ($request->hasFile('gambar_pendukung')) {
            foreach ($request->file('gambar_pendukung') as $supportImage) {
                $supportImageName = time() . '_' . uniqid() . '_support.' . $supportImage->extension();
                $supportImage->storeAs('uploads', $supportImageName, 'public'); // Perhatikan parameter 'public' di sini
                $supportImageNames[] = $supportImageName;
            }
        }

        // Mendapatkan nilai highlights dari request (false jika tidak ada)
        $highlights = $request->has('highlights') ? true : false;

        // Mendapatkan tanggal dari request (null jika tidak ada)
        $tanggal = $request->input('sampai_dengan_tanggal') ? Carbon::parse($request->input('sampai_dengan_tanggal')) : null;

            $postingan = new Postingan([
            'judul_postingan' => $request->input('judul_postingan'),
            'deskripsi' => $request->input('deskripsi'),
            'kategori' => $request->input('kategori'),
            'lokasi' => $request->input('lokasi'),
            'jumlah_suka' => 0,
            'sumber' => $request->input('sumber'),
            'sampul' => $imageName,
            'gambar_pendukung' => implode(',', $supportImageNames),
            'highlights' => $highlights,
            'sampai_dengan_tanggal' => $tanggal,
        ]);

        $postingan->save();

        Alert::success('Berhasil', 'Postingan berhasil disimpan.');
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

        Alert::success('Berhasil', 'Postingan berhasil diperbarui.');
        return redirect()->route('admin.postingan.index');
    }

  
    public function destroy($id)
{
    $postingan = Postingan::find($id);

    if (!$postingan) {
        return redirect()
            ->route('admin.postingan.index')
            ->with('error', 'Postingan tidak ditemukan.');
    }

    $postingan->delete();

    return redirect()
        ->route('admin.postingan.index')
        ->with('success', 'Postingan berhasil dihapus.');
}


}
