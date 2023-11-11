<?php

namespace App\Http\Controllers\Admin;

use App\Models\Carousel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

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

        Alert::success('Berhasil', 'Berhasil Menmbahkan Slider Pada Halaman Utama.');
        return redirect()->route('superadmin.home.index');
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

        Alert::success('Berhasil', 'Slider Pada Halaman Utama Berhasil Diperbarui.');
        return redirect()->route('superadmin.home.index');
    }

  public function destroy(Carousel $carousel)
{
    if ($carousel) {
        $carousel->delete(); 
        return redirect()->route('superadmin.home.index')
            ->with('success', 'Carousel berhasil dihapus');
    } else {
        return redirect()->route('superadmin.home.index')
            ->with('error', 'Carousel tidak ditemukan');
    }
}


}
