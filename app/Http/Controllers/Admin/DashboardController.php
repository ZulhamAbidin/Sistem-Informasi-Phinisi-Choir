<?php

namespace App\Http\Controllers\Admin;


use App\Models\Anggota;
use App\Models\BalasanKomentar;
use App\Models\Carousel;
use App\Models\Komentar;
use App\Models\Postingan;
use App\Models\ProfileLembaga;
use App\Models\Rating;
use App\Models\Saran;
use App\Models\Testimonial;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalUsers = User::count();
        $totalAdmins = User::where('role', 'admin')->count();
        $totalSuperAdmins = User::where('role', 'super_admin')->count();
        $totalVerifiedUsers = User::where('status', 'terverifikasi')->count();
        $totalUnverifiedUsers = User::where('status', 'belum_terverifikasi')->count();

        $totalPostingan = Postingan::count();
        $totalNews = Postingan::where('kategori', 'news')->count();
        $totalCompetition = Postingan::where('kategori', 'competition')->count();
        $totalAchievement = Postingan::where('kategori', 'achievement')->count();

        $totalAnggota = Anggota::count();
        $totalKomentar = Komentar::count();
        $totalBalasanKomentar = BalasanKomentar::count();
        $totalSaran = Saran::count();
        $totalTestimoni = Testimonial::count();
        $totalRating = Rating::count();
        $totalCarousel = Carousel::count();

        return view('SuperAdmin.dashboard', [
            'totalUsers' => $totalUsers,
            'totalAnggota' => $totalAnggota,
            'totalPostingan' => $totalPostingan,
            'totalKomentar' => $totalKomentar,
            'totalBalasanKomentar' => $totalBalasanKomentar,
            'totalSaran' => $totalSaran,
            'totalTestimoni' => $totalTestimoni,
            'totalRating' => $totalRating,
            'totalCarousel' => $totalCarousel,

            'totalPostingan' => $totalPostingan,
            'totalNews' => $totalNews,
            'totalCompetition' => $totalCompetition,
            'totalAchievement' => $totalAchievement,

            'totalUsers' => $totalUsers,
            'totalAdmins' => $totalAdmins,
            'totalSuperAdmins' => $totalSuperAdmins,
            'totalVerifiedUsers' => $totalVerifiedUsers,
            'totalUnverifiedUsers' => $totalUnverifiedUsers,
        ]);
    }
}
