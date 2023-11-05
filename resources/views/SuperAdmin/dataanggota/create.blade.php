@extends('layouts.main')
@section('container')

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
    <div class="row row-cols-4">

        <div class="container">
            <h2>Tambah Anggota Baru</h2>
            <form method="POST" action="{{ route('dataanggota.store') }}" enctype="multipart/form-data">
                @csrf
        
                <div class="mb-3">
                    <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
                    <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" required>
                </div>
        
                <div class="mb-3">
                    <label for="jabatan" class="form-label">Jabatan</label>
                    <input type="text" class="form-control" id="jabatan" name="jabatan" required>
                </div>
        
                <div class="mb-3">
                    <label for="generasi" class="form-label">Generasi</label>
                    <input type="text" class="form-control" id="generasi" name="generasi" required>
                </div>
        
                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat</label>
                    <input type="text" class="form-control" id="alamat" name="alamat" required>
                </div>
        
                <div class="mb-3">
                    <label for="notelfon" class="form-label">Nomor Telepon</label>
                    <input type="text" class="form-control" id="notelfon" name="notelfon" required>
                </div>
        
                <div class="mb-3">
                    <label for="motto" class="form-label">Motto</label>
                    <input type="text" class="form-control" id="motto" name="motto" required>
                </div>
        
                <div class="mb-3">
                    <label for="deskripsi" class="form-label">Deskripsi</label>
                    <textarea class="form-control" id="deskripsi" name="deskripsi" required></textarea>
                </div>
        
                <div class="mb-3">
                    <label for="foto" class="form-label">Foto</label>
                    <input type="file" class="form-control" id="foto" name="foto" required>
                </div>
        
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>

    </div>
</div>

@endsection