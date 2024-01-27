@extends('layouts.main')
@section('container')
    <div class="container">
        <div class="main-container container-fluid">
            <div class="page-header">
                <h1 class="page-title">Edit Data Anggota</h1>
                <div>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Edit</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Data Anggota</li>
                    </ol>
                </div>
            </div>
        </div>

        <div class="row justify-content-center mt-4">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ route('dataanggota.update', ['id' => $anggota->id]) }}"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <div class="mb-3 col-12 col-md-6">
                                <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
                                <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" required
                                    value="{{ $anggota->nama_lengkap }}">
                            </div>

                            <div class="mb-3 col-12 col-md-6">
                                <label for="nra" class="form-label">NRA</label>
                                <input type="text" class="form-control" placeholder="G10.015.2021" id="nra" name="nra" required value="{{ $anggota->nra }}">
                            </div>

                            <div class="mb-3 col-12 col-md-6">
                                <label for="jabatan" class="form-label">Jabatan</label>
                                <input type="text" class="form-control" id="jabatan" name="jabatan" required
                                    value="{{ $anggota->jabatan }}">
                            </div>

                            <div class="mb-3 col-12 col-md-6">
                                <label for="generasi" class="form-label">Generasi</label>
                                <input type="text" class="form-control" id="generasi" name="generasi" required
                                    value="{{ $anggota->generasi }}">
                            </div>

                            <div class="mb-3 col-12 col-md-6">
                                <label for="alamat" class="form-label">Alamat</label>
                                <input type="text" class="form-control" id="alamat" name="alamat" required
                                    value="{{ $anggota->alamat }}">
                            </div>

                            <div class="mb-3 col-12 col-md-6">
                                <label for="notelfon" class="form-label">Nomor Telepon</label>
                                <input type="text" class="form-control" id="notelfon" name="notelfon" required
                                    value="{{ $anggota->notelfon }}">
                            </div>

                            <div class="mb-3 col-12 col-md-12">
                                <label for="deskripsi" class="form-label">Deskripsi</label>
                                <textarea class="form-control" id="deskripsi" name="deskripsi" required
                                    value="a">{{ $anggota->deskripsi }}</textarea>
                            </div>

                            <div class="mb-3 col-12 col-md-6">
                                <label for="motto" class="form-label">Motto</label>
                                <input type="text" class="form-control" id="motto" name="motto" required
                                    value="{{ $anggota->motto }}">
                            </div>

                            <div class="mb-3 col-12 col-md-6">
                                <label for="foto" class="form-label">Unggah Gambar Baru</label>
                                <input type="file" class="form-control" id="foto" name="foto"
                                    onchange="previewImage(this)">
                            </div>

                            <div class="mb-3 col-12 col-md-6">
                                <label for="foto" class="form-label">Preview Gambar Lama</label>
                                <img src="{{ asset('storage/uploads/' . $anggota->foto) }}" alt="Current foto"
                                    class="img-thumbnail">
                            </div>

                            <div class="mb-3 col-12 col-md-6">
                                <label class="form-label">Preview Gambar Baru</label>
                                <img id="image-preview" src="" alt="Preview Gambar Tidak Ada"
                                    style="max-width: 100%">
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

    <script>
        function previewImage(input) {
            var preview = document.getElementById('image-preview');
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                };
                reader.readAsDataURL(input.files[0]);
            } else {
                preview.src = "";
            }
        }
    </script>
@endsection
