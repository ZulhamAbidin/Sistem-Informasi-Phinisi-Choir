<?php

namespace App\Http\Controllers\Pengunjung;

use Carbon\Carbon;
use RealRashid\SweetAlert\Facades\Alert;
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
        $averageRating = $beritadetail->komentars()->avg('rating');

        $postinganLainnya = Postingan::where('id', '!=', $id)
            ->inRandomOrder()
            ->take(5)
            ->get();

        return view('pengunjung.news.detail', compact('beritadetail', 'averageRating', 'postinganLainnya'));
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

    public function tambahKomentar(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'postingan_id' => 'required',
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
            'postingan_id' => $request->input('postingan_id'),
            'nama' => $request->input('nama'),
            'isi_komentar' => $request->input('isi_komentar'),
            'rating' => $request->input('rating'),
        ]);

        $komentar->save();
        $postingan = Postingan::find($komentar->postingan_id);
        $averageRating = $postingan->komentars->avg('rating');
        $postingan->update([
            'rating' => $averageRating,
        ]);

        Alert::success('Berhasil', 'Menambahkan Komentar.');
        return redirect()->back();
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
            if ($user->role === 'admin') {
                $namaLengkap .= ' (Anggota Pengurus)';
            }
        } else {
            $namaLengkap = $request->input('nama');
        }

        $readonly = Auth::check() ? 'readonly' : '';

        $balasanKomentar = new BalasanKomentar([
            'nama' => $namaLengkap,
            'isi_balasan' => $request->input('isi_balasan'),
            'komentar_id' => $komentar->id,
            'parent_komentar_id' => $parentKomentarId,
            'centang_biru' => $centangBiru,
        ]);

        $balasanKomentar->save();

        Alert::success('Berhasil', 'Balasan komentar berhasil Ditambahkan.');
        return redirect()->back();
    }

    public function showKomentar()
{
    $komentar = Komentar::find($id); // Mengambil data komentar dari model

    return view('pengunjung.news.detail', ['komentar' => $komentar]);
}


    public function hapusKomentar($komentarId)
    {
        $komentar = Komentar::find($komentarId);

        if (auth()->user()->role !== 'super_admin') {
            return redirect()
                ->back()
                ->with('error', 'Anda tidak memiliki izin untuk menghapus komentar.');
        }

        if (!$komentar) {
            return redirect()
                ->back()
                ->with('error', 'Komentar tidak ditemukan.');
        }

        $komentar->delete();

        Alert::success('Berhasil', 'komentar berhasil dihapus.');

        return redirect()->back();
    }

    public function hapusBalasanKomentar($komentarId)
    {
        $balasanKomentar = BalasanKomentar::find($komentarId);

        if (auth()->user()->role !== 'super_admin') {
            return response()->json(['message' => 'Anda tidak diizinkan untuk menghapus balasan komentar.'], 403);
        }

        if (!$balasanKomentar) {
            return response()->json(['message' => 'Balasan komentar tidak ditemukan.'], 404);
        }

        $balasanKomentar->delete();

        Alert::success('Berhasil', 'Balasan komentar berhasil dihapus.');

        return redirect()->back();
    }

    public function likePostingan($id)
    {
        $beritadetail = Postingan::find($id);

        if ($beritadetail) {
            $beritadetail->jumlah_suka += 1;
            $beritadetail->save();
            Alert::success('Berhasil', 'Menambahkan Like.'); // Menampilkan alert sukses
            return redirect()->back(); // Kembali ke halaman sebelumnya
        }

        Alert::error('Gagal', 'Postingan tidak ditemukan.'); // Menampilkan alert error
        return redirect()->back(); // Kembali ke halaman sebelumnya
    }

    public function likeKomentar($id)
    {
        $komentar = Komentar::find($id);

        if ($komentar) {
            $komentar->jumlah_suka += 1;
            $komentar->save();
            Alert::success('Berhasil', 'Menambahkan Like pada Komentar.'); // Menampilkan alert sukses
            return redirect()->back(); // Kembali ke halaman sebelumnya
        }

        Alert::error('Gagal', 'Komentar tidak ditemukan.'); // Menampilkan alert error
        return redirect()->back(); // Kembali ke halaman sebelumnya
    }

    public function likeBalasanKomentar($id)
    {
        $balasanKomentar = BalasanKomentar::find($id);

        if ($balasanKomentar) {
            $balasanKomentar->jumlah_suka += 1;
            $balasanKomentar->save();
            Alert::success('Berhasil', 'Menambahkan Like pada Balasan Komentar.');
            return redirect()->back();
        }

        Alert::error('Gagal', 'Balasan Komentar tidak ditemukan.');
        return redirect()->back();
    }
}
