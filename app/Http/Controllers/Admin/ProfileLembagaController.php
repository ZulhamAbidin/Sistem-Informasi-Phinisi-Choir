<?php

namespace App\Http\Controllers\Admin;

use DOMDocument;
use Illuminate\Http\Request;
use App\Models\ProfileLembaga;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

class ProfileLembagaController extends Controller
{
    public function index()
    {
        $profiles = ProfileLembaga::first();
        return view('SuperAdmin.profilelembaga.index', compact('profiles'));
    }

    public function create()
    {
        return view('SuperAdmin.profilelembaga.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'noponsel' => 'required',
            'body' => 'required',
        ]);

        $dom = new \DOMDocument();
        libxml_use_internal_errors(true);

        $dom->loadHTML($request->body, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);

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

        if ($validator->fails()) {
            Alert::error('Error', 'Panjang gambar dan teks terlalu besar. Pastikan gambar dan teks memiliki ukuran yang sesuai untuk memastikan tampilan halaman website yang baik.');
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $body = $dom->saveHTML();
        ProfileLembaga::create([
            'judul' => $request->judul,
            'noponsel' => $request->noponsel,
            'body' => $body,
        ]);

        Alert::success('Success', 'Profile lembaga berhasil ditambahkan.');
        return redirect()->route('profile-lembaga.index');
    }

    public function edit($id)
    {
        $profile = ProfileLembaga::find($id);
        return view('SuperAdmin.profilelembaga.edit', compact('profile'));
    }

    public function about()
    {
        $profiles = ProfileLembaga::first();
        return view('about', compact('profiles'));
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'noponsel' => 'required',
            'body' => 'required',
            'judul' => '',
        ]);

        $profile = ProfileLembaga::find($id);

        if (!$profile) {
            Alert::error('Error', 'Data profile tidak ditemukan.');
            return redirect()->route('profile-lembaga.index');
        }

        $dom = new \DOMDocument();
        libxml_use_internal_errors(true);

        $dom->loadHTML($request->body, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);

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

        if ($validator->fails()) {
            Alert::error('Error', 'Panjang gambar dan teks terlalu besar. Pastikan gambar dan teks memiliki ukuran yang sesuai untuk memastikan tampilan halaman website yang baik.');
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $profile->update([
            'judul' => $request->judul,
            'noponsel' => $request->noponsel,
            'body' => $dom->saveHTML(),
        ]);

        Alert::success('Success', 'Profile lembaga berhasil diperbarui.');
        return redirect()->route('profile-lembaga.index');
    }
}
