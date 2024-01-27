@extends('layouts.main')
@section('container')
<div class="container">
    <div class="main-container container-fluid">
        <div class="page-header">
            <h1 class="page-title">Edit Testimonial</h1>
            <div>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Lihat</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('testimonials.index') }}">Testimonials</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Edit Testimonial</li>
                </ol>
            </div>
        </div>
    </div>

    <div class="row justify-content-center mt-4">
        <div class="card">
            <div class="card-body">
                <form method="POST" action="{{ route('testimonials.update', ['id' => $testimonial->id]) }}"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <!-- Tambahkan metode PUT untuk edit -->

                    <div class="row">
                        <div class="mb-3 col-12 col-md-6">
                            <label for="name" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="name" name="name" required
                                value="{{ $testimonial->name }}">
                            @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3 col-12 col-md-6">
                            <label for="jabatan" class="form-label">Jabatan/Pekerjaan</label>
                            <input type="text" class="form-control" id="jabatan" name="jabatan" required value="{{ $testimonial->jabatan }}">
                            @error('jabatan')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3 col-12 col-md-12">
                            <label for="content" class="form-label">Deskripsi</label>
                            <input type="text" class="form-control" id="content" name="content" required
                                value="{{ $testimonial->content }}">
                            @error('content')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3 col-12">
                            <label for="foto" class="form-label">Foto</label>
                            <input type="file" class="form-control" id="foto" name="foto">
                            <small class="text-danger">pastikan anda mengunggah gambar persegi</small>
                            @error('foto')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3 col-12">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection