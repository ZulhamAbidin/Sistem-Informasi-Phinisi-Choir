@extends('layouts.main')
@section('container')
<div class="container">
    <div class="main-container container-fluid">
        <div class="page-header">
            <h1 class="page-title">Tambah Data Anggota</h1>
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
                <form method="POST" action="{{ route('manajemenuser.store') }}" enctype="multipart/form-data">
                    @csrf
                
                    <div class="row">
                        <div class="mb-3 col-12 col-md-6">
                            <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
                            <input type="text" class="form-control @error('nama_lengkap') is-invalid @enderror" id="nama_lengkap"
                                name="nama_lengkap" required value="{{ old('nama_lengkap') }}">
                            @error('nama_lengkap')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                
                        <div class="mb-3 col-12 col-md-6">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password"
                                name="password" required>
                            @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                
                        <div class="mb-3 col-12 col-md-4">
                            <label for="nra" class="form-label">NRA</label>
                            <input type="teks" placeholder="G10.015.2021" class="form-control @error('nra') is-invalid @enderror" id="nra" name="nra" required
                                value="{{ old('nra') }}">
                            @error('nra')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                
                        <div class="mb-3 col-12 col-md-4">
                            <label for="role" class="form-label">Role</label>
                            <select class="form-select @error('role') is-invalid @enderror" id="role" name="role" required>
                                <option value="admin" {{ old('role')=='admin' ? 'selected' : '' }}>Anggota</option>
                                <option value="super_admin" {{ old('role')=='super_admin' ? 'selected' : '' }}>Admin</option>
                            </select>
                            @error('role')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                
                        <div class="mb-3 col-12 col-md-4">
                            <label for="status" class="form-label">Status</label>
                            <select class="form-select @error('status') is-invalid @enderror" id="status" name="status" required>
                                <option value="terverifikasi">Terverifikasi</option>
                                <option value="belum_terverifikasi">Belum Terverifikasi</option>
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