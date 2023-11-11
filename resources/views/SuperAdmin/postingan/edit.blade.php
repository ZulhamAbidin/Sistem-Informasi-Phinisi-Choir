@extends('layouts.main')
@section('container')
<div class="main-container container-fluid">

    <div class="page-header">
        <h1 class="page-title">Edit Postingan</h1>
        <div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Postingan</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit Postingan</li>
            </ol>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <form action="{{ route('admin.postingan.update', ['id' => $postingan->id]) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <!-- Judul Postingan -->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="judul_postingan">Judul Postingan</label>
                                    <input type="text" name="judul_postingan" class="form-control"
                                        value="{{ old('judul_postingan', $postingan->judul_postingan) }}" required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="judul_postingan">Kategori</label>
                                    <input type="text" name="judul_postingan" class="form-control"
                                        value="{{ old('judul_postingan', $postingan->kategori) }}" readonly>
                                </div>
                            </div>

                            {{-- <div class="col-md-6">
                                <div class="form-group">
                                    <label for="kategori">Kategori</label>
                                    <select name="kategori" class="form-control form-select" required>
                                        <option value="achievement" {{ old('kategori', $postingan->kategori) == 'achievement' ? 'selected' : '' }}>achievement</option>
                                        <option value="competition" {{ old('kategori', $postingan->kategori) == 'competition' ? 'selected' : '' }}>competition</option>
                                        <option value="news" {{ old('kategori', $postingan->kategori) == 'news' ? 'selected' : '' }}>news</option>
                                    </select>
                                </div>
                            </div> --}}

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="lokasi">Lokasi</label>
                                    <input type="text" name="lokasi" class="form-control"
                                        value="{{ old('lokasi', $postingan->lokasi) }}" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="sumber">Sumber</label>
                                    <input type="text" name="sumber" class="form-control" value="{{ old('sumber', $postingan->sumber) }}" readonly>
                                </div>
                            </div>

                           <div class="col-md-6">
                            <div class="form-group">
                                <label for="sampul">Gambar Utama</label>
                                <input type="file" name="sampul" class="form-control" accept="image/*">
                                <!-- Input tersembunyi untuk menyimpan gambar utama saat ini -->
                                <input type="hidden" name="current_sampul" value="{{ $postingan->sampul }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="gambar_pendukung">Gambar Pendukung</label>
                                <input type="file" name="gambar_pendukung[]" class="form-control" multiple>
                                <small class="text-danger">Maksimal 15 Gambar</small>
                                <!-- Input tersembunyi untuk menyimpan gambar pendukung saat ini -->
                                <input type="hidden" name="current_gambar_pendukung" value="{{ $postingan->gambar_pendukung }}">
                            </div>
                        </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="deskripsi">Deskripsi</label>
                                    <textarea name="deskripsi" class="form-control" rows="4"
                                        required>{{ old('deskripsi', $postingan->deskripsi) }}</textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary btn-block">Simpan Perubahan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection