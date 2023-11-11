<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Carousel;
use App\Models\Postingan;
use App\Models\Testimonial;
use Carbon\CarbonInterface;
use Illuminate\Http\Request;
use App\Http\Controllers\WelcomeController;

class WelcomeController extends Controller
{
     public function index()
{
    $posts = Postingan::orderBy('rating', 'desc')->take(3)->get();
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
}
