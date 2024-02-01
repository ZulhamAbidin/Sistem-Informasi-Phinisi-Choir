@extends('layouts.main')
@section('container')
<div class="container">
    <div class="main-container container-fluid">
        <div class="page-header">
            <h1 class="page-title">Edit Data Anggota</h1>
            <div>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Lihat</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Data Anggota</li>
                </ol>
            </div>
        </div>
    </div>

    <div class="row justify-content-center mt-4">
        <div class="card">
            <div class="card-body">
                <form method="POST" action="{{ route('manajemenuser.update', $user->id) }}"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="row">
                        <div class="mb-3 col-12 col-md-6">
                            <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
                            <input type="text" class="form-control @error('nama_lengkap') is-invalid @enderror"
                                id="nama_lengkap" required name="nama_lengkap" required
                                value="{{ old('nama_lengkap', $user->nama_lengkap) }}">
                            @error('nama_lengkap')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3 col-12 col-md-6">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror"
                                id="password" required name="password">
                            @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3 col-12 col-md-4">
                            <label for="nra" class="form-label">NRA</label>
                            <input type="text" class="form-control @error('nra') is-invalid @enderror" id="nra"
                                required name="nra" required value="{{ old('nra', $user->nra) }}">
                            @error('nra')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3 col-12 col-md-4">
                            <label for="role" class="form-label">Role</label>
                            <select class="form-select @error('role') is-invalid @enderror" id="role" required name="role"
                                required>
                                <option value="admin" {{ old('role', $user->role)=='admin' ? 'selected' : '' }}>Admin
                                </option>
                                <option value="super_admin" {{ old('role', $user->role)=='super_admin' ? 'selected' : ''
                                    }}>Super Admin</option>
                            </select>
                            @error('role')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3 col-12 col-md-4">
                            <label for="status" class="form-label">Status</label>
                            <select class="form-select @error('status') is-invalid @enderror" id="status" required name="status"
                                required>
                                <option value="terverifikasi" {{ old('status', $user->status)=='terverifikasi' ?
                                    'selected' : '' }}>Terverifikasi</option>
                                <option value="belum_terverifikasi" {{ old('status', $user->
                                    status)=='belum_terverifikasi' ? 'selected' : '' }}>Belum Terverifikasi</option>
                            </select>
                            @error('status')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3 col-12 col-md-6">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection