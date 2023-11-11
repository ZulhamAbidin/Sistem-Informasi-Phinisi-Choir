<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class ManajemenUserController extends Controller
{
    public function index()
    {
        $users = User::paginate(5); 
        return view('SuperAdmin.manajemenuser.list', compact('users'));
    }

    public function create()
    {
        return view('SuperAdmin.manajemenuser.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_lengkap' => 'required',
            'nra' => 'required|numeric|unique:users',
            'password' => 'required',
            'role' => 'required|in:admin,super_admin',
            'status' => 'required|in:terverifikasi,belum_terverifikasi',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $user = new User([
            'nama_lengkap' => $request->get('nama_lengkap'),
            'nra' => $request->get('nra'),
            'password' => bcrypt($request->get('password')),
            'role' => $request->get('role'),
            'status' => $request->get('status'),
        ]);

        if ($request->hasFile('foto')) {
            $uploadedFile = $request->file('foto');
            $imageName = time() . '.' . $uploadedFile->getClientOriginalExtension();
            $uploadedFile->storeAs('uploads', $imageName, 'public');
            $user->foto = $imageName;
        }

        $user->save();

        Alert::success('success', 'User berhasil ditambahkan.');
        return redirect()->route('manajemenuser.index');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('SuperAdmin.manajemenuser.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_lengkap' => 'required',
            'nra' => 'required|unique:users,nra,' . $id,
            'password' => 'required',
            'role' => 'required|in:admin,super_admin',
            'status' => 'required|in:terverifikasi,belum_terverifikasi',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $user = User::findOrFail($id);

        $user->update([
            'nama_lengkap' => $request->get('nama_lengkap'),
            'nra' => $request->get('nra'),
            'password' => bcrypt($request->get('password')),
            'role' => $request->get('role'),
            'status' => $request->get('status'),
        ]);

        if ($request->hasFile('foto')) {
            $uploadedFile = $request->file('foto');
            $imageName = time() . '.' . $uploadedFile->getClientOriginalExtension();
            $uploadedFile->storeAs('uploads', $imageName, 'public');
            $user->foto = $imageName;
            $user->save();
        }

        return redirect()
            ->route('manajemenuser.index')
            ->with('success', 'User berhasil diperbarui!');
    }

    

    public function destroy($id)
{
    $user = User::find($id);

    if (!$user) {
        return redirect()
            ->route('manajemenuser.index') // Ganti route ke indeks
            ->with('error', 'User tidak ditemukan.');
    }

    $user->delete();

    return redirect()
        ->route('manajemenuser.index') // Ganti route ke indeks
        ->with('success', 'User berhasil dihapus.');
}

}
