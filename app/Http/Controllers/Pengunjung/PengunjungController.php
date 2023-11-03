<?php

namespace App\Http\Controllers\Pengunjung;

use Carbon\Carbon;
use App\Models\Komentar;
use App\Models\Postingan;
use Illuminate\Http\Request;
use App\Models\BalasanKomentar;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class PengunjungController extends Controller
{
    public function ListBerita(Request $request)
    {
        $search = $request->input('search');
        $listberita = Postingan::when($search, function ($query) use ($search) {
            $query->where(function ($query) use ($search) {
                $query
                    ->where('judul_postingan', 'like', '%' . $search . '%')
                    ->orWhere('kategori', 'like', '%' . $search . '%')
                    ->orWhere('deskripsi', 'like', '%' . $search . '%')
                    ->orWhere('lokasi', 'like', '%' . $search . '%')
                    ->orWhere('sumber', 'like', '%' . $search . '%');
            });
        })
            ->orderBy('created_at', 'desc')
            ->get();

        return view('pengunjung.news.list', compact('listberita', 'search'));
    }

    public function DetailBerita($id)
    {
        $beritadetail = Postingan::withCount('komentars')->find($id);

        if (!$beritadetail) {
            return redirect()->route('pengunjung.news.list');
        }

        $beritadetail->selisihWaktu = Carbon::parse($beritadetail->created_at)->diffForHumans();

        // Menghitung rata-rata rating
        $averageRating = $beritadetail->komentars()->avg('rating');

        // Mengirim rata-rata rating ke view
        return view('pengunjung.news.detail', compact('beritadetail', 'averageRating'));
    }

    public function tambahKomentar(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'postingan_id' => 'required', // Pastikan 'postingan_id' disertakan dalam request
            'nama' => ['required', 'regex:/^[a-zA-Z\s]+$/'],
            'isi_komentar' => 'required',
            'rating' => 'required|numeric|min:1|max:5',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $komentar = new Komentar([
            'postingan_id' => $request->input('postingan_id'), // Set 'postingan_id' dari permintaan
            'nama' => $request->input('nama'),
            'isi_komentar' => $request->input('isi_komentar'),
            'rating' => $request->input('rating'),
        ]);

        $komentar->save();

        // Dapatkan postingan berdasarkan ID yang diambil dari entitas Komentar
        $postingan = Postingan::find($komentar->postingan_id);

        // Hitung rata-rata rating dari komentar
        $averageRating = $postingan->komentars->avg('rating');

        // Perbarui nilai 'rating' pada postingan
        $postingan->update([
            'rating' => $averageRating,
        ]);

        // Redirect ke halaman tampilan detail postingan
        return redirect()->route('pengunjung.news.show', ['id' => $komentar->postingan_id]);
    }

    public function totalRating(Postingan $beritadetail)
    {
        return $beritadetail->komentars()->sum('rating');
    }

    public function averageRating(Postingan $beritadetail)
    {
        $totalRating = $this->totalRating($beritadetail);
        $totalKomentar = $beritadetail->komentars()->count();

        if ($totalKomentar > 0) {
            return $totalRating / $totalKomentar;
        } else {
            return 0;
        }
    }
public function tambahBalasanKomentar(Request $request, Postingan $beritadetail, $komentarId)
{
    $komentar = Komentar::findOrFail($komentarId);

    $validator = Validator::make($request->all(), [
        'isi_balasan' => 'required',
    ]);

    if ($validator->fails()) {
        return redirect()
            ->back()
            ->withErrors($validator)
            ->withInput();
    }

    $parentKomentarId = $komentar->id;

    $centangBiru = Auth::check();

    $namaLengkap = '';

    if (Auth::check()) {
        $user = auth()->user();
        $namaLengkap = $user->nama_lengkap;

        // Tambahkan "(Anggota Pengurus)" jika user memiliki role sebagai admin
        if ($user->role === 'admin') {
            $namaLengkap .= ' (Anggota Pengurus)';
        }
    } else {
        // Ambil dari input form jika user tidak masuk
        $namaLengkap = $request->input('nama');
    }

    $readonly = Auth::check() ? 'readonly' : '';

    // Membuat objek BalasanKomentar
    $balasanKomentar = new BalasanKomentar([
        'nama' => $namaLengkap, // Ambil 'nama_lengkap' dari model User jika sudah masuk, jika belum, ambil dari inputan form
        'isi_balasan' => $request->input('isi_balasan'),
        'komentar_id' => $komentar->id,
        'parent_komentar_id' => $parentKomentarId,
        'centang_biru' => $centangBiru,
    ]);

    $balasanKomentar->save();

    return redirect()
        ->route('pengunjung.news.show', ['id' => $beritadetail->id])
        ->with('success', 'Balasan komentar berhasil ditambahkan.');
}


}
