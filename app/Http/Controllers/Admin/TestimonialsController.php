<?php

namespace App\Http\Controllers\Admin;

use Storage;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class TestimonialsController extends Controller
{
    public function index()
    {
        $testimonials = Testimonial::paginate(3);
        return view('SuperAdmin.testimonials.index', compact('testimonials'));
    }

    public function create()
    {
        return view('SuperAdmin.testimonials.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'content' => 'required',
            'jabatan' => 'required',
            'foto' => 'required',
        ]);

        $testimonial = new Testimonial([
            'name' => $request->get('name'),
            'jabatan' => $request->get('jabatan'),
            'content' => $request->get('content'),
        ]);

        if ($request->hasFile('foto')) {
            $uploadedFile = $request->file('foto');
            $imageName = time() . '.' . $uploadedFile->getClientOriginalExtension();
            $uploadedFile->storeAs('uploads', $imageName, 'public');

            if ($testimonial->foto && $testimonial->foto !== 'default.jpg') {
                Storage::disk('public')->delete('uploads/' . $testimonial->foto);
            }
            $testimonial->foto = $imageName;
        }

        $testimonial->save();

        Alert::success('Berhasil', 'Testimonial berhasil ditambahkan.');
        return redirect()->route('testimonials.index');
    }

    public function edit($id)
    {
        $testimonial = Testimonial::find($id);
        return view('SuperAdmin.testimonials.edit', compact('testimonial'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'content' => 'required',
            'jabatan' => 'required',
            'foto' => 'required',
        ]);

        $testimonial = Testimonial::find($id);
        $testimonial->name = $request->get('name');
        $testimonial->jabatan = $request->get('jabatan');
        $testimonial->content = $request->get('content');

        if ($request->hasFile('foto')) {
            $uploadedFile = $request->file('foto');
            $imageName = time() . '.' . $uploadedFile->getClientOriginalExtension();
            $uploadedFile->storeAs('uploads', $imageName, 'public');

            if ($testimonial->foto && $testimonial->foto !== 'default.jpg') {
                Storage::disk('public')->delete('uploads/' . $testimonial->foto);
            }
            $testimonial->foto = $imageName;
        }

        $testimonial->save();

        Alert::success('Berhasil', 'Testimonial berhasil diperbarui.');
        return redirect()->route('testimonials.index');
    }

    public function destroy($id)
    {
        $testimonial = Testimonial::find($id);

        if (!$testimonial) {
            return redirect()
                ->route('testimonials.index')
                ->with('error', 'Testimonial tidak ditemukan.');
        }

        $testimonial->delete();

        return redirect()
            ->route('testimonials.index')
            ->with('success', 'Testimonial berhasil dihapus.');
    }
}
