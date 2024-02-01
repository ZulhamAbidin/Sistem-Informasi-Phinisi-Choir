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
                    <form method="POST" action="{{ route('dataanggota.store') }}" enctype="multipart/form-data">
                        @csrf
        
                        <div class="row">
                            <div class="mb-3 col-12 col-md-6">
                                <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
                                <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" required>
                            </div>

                            <div class="mb-3 col-12 col-md-6">
                                <label for="nra" class="form-label">NRA</label>
                                <input type="text" class="form-control" id="nra" name="nra" required placeholder="G10.015.2021" value="">
                            </div>
                            
                            <div class="mb-3 col-12 col-md-6">
                                <label for="jabatan" class="form-label">Jabatan</label>
                                <input type="text" class="form-control" id="jabatan" name="jabatan" required>
                            </div>
                            
                            <div class="mb-3 col-12 col-md-6">
                                <label for="generasi" class="form-label">Generasi</label>
                                <input type="text" class="form-control" id="generasi" name="generasi" required>
                            </div>
                            
                            <div class="mb-3 col-12 col-md-6">
                                <label for="alamat" class="form-label">Alamat</label>
                                <input type="text" class="form-control" id="alamat" name="alamat" required>
                            </div>
                            
                            <div class="mb-3 col-12 col-md-6">
                                <label for="notelfon" class="form-label">Nomor Telepon</label>
                                <input type="text" class="form-control" id="notelfon" name="notelfon" required>
                            </div>
                            
                            <div class="mb-3 col-12 col-md-6">
                                <label for="motto" class="form-label">Motto</label>
                                <input type="text" class="form-control" id="motto" name="motto" required>
                            </div>

                            <div class="mb-3 col-12 col-md-6">
                                <label for="foto" class="form-label">Foto</label>
                                <input type="file" class="form-control" id="foto" name="foto" required>
                            </div>
                            
                            <div class="mb-3 col-12 col-md-12">
                                <label for="deskripsi" class="form-label">Deskripsi</label>
                                <textarea class="form-control" id="deskripsi" name="deskripsi" required></textarea>
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
