<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Saran;
use App\Models\Carousel;
use App\Models\Postingan;
use App\Models\Testimonial;
use Carbon\CarbonInterface;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Controllers\WelcomeController;

class WelcomeController extends Controller
{
    public function index()
    {
        $posts = Postingan::orderBy('rating', 'desc')
            ->take(3)
            ->get();
        $carousels = Carousel::all();
        $testimonials = Testimonial::all();
        foreach ($posts as $post) {
            $post->selisihWaktu = $this->hitungSelisihWaktu($post->created_at);
        }

        return view('welcome', compact('posts', 'carousels', 'testimonials'));
    }

    private function hitungSelisihWaktu($createdAt)
    {
        $now = Carbon::now();
        $createdAt = Carbon::parse($createdAt);

        return $createdAt->diffForHumans($now, [
            'syntax' => CarbonInterface::DIFF_RELATIVE_TO_NOW,
        ]);
    }

    public function submitSaran(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required|email',
            'pesan' => 'required',
        ]);

        Saran::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'pesan' => $request->pesan,
        ]);

        Alert::success('success', 'Saran Anda berhasil disimpan. Terima kasih.');
        return redirect()->route('welcome');

        // return redirect()->route('welcome')->with('success', 'Saran Anda berhasil disimpan. Terima kasih!');
    }

    public function indexsaran()
    {
        $saran = Saran::paginate(10); // Ganti 10 dengan jumlah item yang diinginkan per halaman
        return view('SuperAdmin.saran.index', compact('saran'));
    }


    public function destroy($id)
    {
        $saran = Saran::find($id);

        if (!$saran) {
            return redirect()
                ->route('admin.saran.index')
                ->with('error', 'saran dan tanggapan tidak ditemukan.');
        }

        $saran->delete();

        return redirect()
            ->route('admin.saran.index')
            ->with('success', 'saran dan tanggapan berhasil dihapus.');
    }
}

