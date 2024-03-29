<?php
namespace App\Http\Controllers\Admin;

use Storage;
use Carbon\Carbon;
use App\Models\Postingan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use RealRashid\SweetAlert\Facades\Alert;

class AchievementController extends Controller
{
    public function index()
    {
        // $postingans = Postingan::where('kategori', 'achievement')->get();
        $postingans = Postingan::where('kategori', 'achievement')->paginate(3);
        $postingans->transform(function ($postingan) {
            $postingan->selisihWaktu = Carbon::parse($postingan->created_at)->diffForHumans();
            return $postingan;
        });

        return view('SuperAdmin.achievement.index', compact('postingans'));
    }
}
