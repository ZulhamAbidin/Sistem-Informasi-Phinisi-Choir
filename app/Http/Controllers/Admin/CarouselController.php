<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Carousel;
use Illuminate\Support\Facades\Storage;

class CarouselController extends Controller
{
    public function index()
    {
        $carousels = Carousel::all();
        return view('SuperAdmin.home.index', compact('carousels'));
    }

    public function create()
    {
        return view('SuperAdmin.home.create');
    }

    public function edit(Carousel $carousel)
    {
        return view('SuperAdmin.home.edit', compact('carousel'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'required',
        ]);

        $carousel = new Carousel();
        $carousel->title = $request->title;
        $carousel->description = $request->description;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();

            $image->storeAs('uploads', $imageName, 'public');

            $carousel->image_path = $imageName;
        }

        $carousel->save();

        return redirect()
            ->route('superadmin.home.index')
            ->with('success', 'Carousel berhasil ditambahkan.');
    }

    public function update(Request $request, Carousel $carousel)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'image',
        ]);

        $carousel->title = $request->title;
        $carousel->description = $request->description;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('uploads', $imageName, 'public');
            $carousel->image_path = $imageName;
        }

        $carousel->save();

        return redirect()
            ->route('superadmin.home.index')
            ->with('success', 'Carousel berhasil diperbarui.');
    }

  public function destroy(Carousel $carousel)
{
    if ($carousel) {
        $carousel->delete(); // Hapus data carousel dari database
        return redirect()->route('superadmin.home.index')
            ->with('success', 'Carousel berhasil dihapus');
    } else {
        return redirect()->route('superadmin.home.index')
            ->with('error', 'Carousel tidak ditemukan');
    }
}


}
