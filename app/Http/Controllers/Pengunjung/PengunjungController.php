<?php

namespace App\Http\Controllers\Pengunjung;

use Carbon\Carbon;
use App\Models\Postingan;
use App\Models\Komentar;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PengunjungController extends Controller
{
    public function ListBerita()
    {
        $listberita = Postingan::orderBy('created_at', 'desc')->get();
        return view('pengunjung.news.list', compact('listberita'));
    }

    public function DetailBerita($id)
{
    $beritadetail = Postingan::withCount('komentars')->find($id);

    if (!$beritadetail) {
        return redirect()->route('pengunjung.news.show');
    }

    $beritadetail->selisihWaktu = Carbon::parse($beritadetail->created_at)->diffForHumans();

    return view('pengunjung.news.detail', compact('beritadetail'));
}


    // public function DetailBerita($id)
    // {
    //     $beritadetail = Postingan::find($id);
    //     $beritadetail = Postingan::withCount('komentars')->find($id);

    //     if (!$beritadetail) {
    //         return redirect()->route('pengunjung.news.show');
    //     }

    //     $beritadetail->selisihWaktu = Carbon::parse($beritadetail->created_at)->diffForHumans();

    //     return view('pengunjung.news.detail', compact('beritadetail'));
    // }
}