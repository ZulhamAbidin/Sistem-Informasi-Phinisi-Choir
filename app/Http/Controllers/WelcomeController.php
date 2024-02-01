<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Saran;
use App\Models\Carousel;
use App\Models\Jumbotron;
use App\Models\Postingan;
use App\Models\Testimonial;
use Carbon\CarbonInterface;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Controllers\WelcomeController;

class WelcomeController extends Controller
{
    public function index(Request $request)
    {
        $posts = Postingan::orderBy('rating', 'desc')
            ->take(2)
            ->get();
        $carousels = Carousel::all();
        $jumbotrons = Jumbotron::paginate(10);
        $testimonials = Testimonial::all();
        foreach ($posts as $post) {
            $post->selisihWaktu = $this->hitungSelisihWaktu($post->created_at);
        }

        $search = $request->input('search');

        $listberita = Postingan::latest()
            ->when($search, function ($query) use ($search) {
                $query->where(function ($query) use ($search) {
                    $query
                        ->where('judul_postingan', 'like', '%' . $search . '%')
                        ->orWhere('deskripsi', 'like', '%' . $search . '%')
                        ->orWhere('lokasi', 'like', '%' . $search . '%')
                        ->orWhere('sumber', 'like', '%' . $search . '%');
                });
            })
            ->paginate(8); // Sesuaikan jumlah item per halaman dengan kebutuhan Anda

        return view('welcome', compact('posts', 'carousels', 'testimonials', 'listberita', 'search', 'jumbotrons'));
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

