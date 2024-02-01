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
                                    <label for="kategori">Kategori</label>
                                    <select name="kategori" class="form-control form-select" required>
                                        <option value="achievement" {{ old('kategori', $postingan->kategori) == 'achievement' ? 'selected' : '' }}>achievement</option>
                                        <option value="competition" {{ old('kategori', $postingan->kategori) == 'competition' ? 'selected' : '' }}>competition</option>
                                        <option value="news" {{ old('kategori', $postingan->kategori) == 'news' ? 'selected' : '' }}>news</option>
                                    </select>
                                </div>
                            </div>

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
                                    <input type="text" value="{{ $postingan->sumber }}" name="sumber" class="form-control">
                                </div>
                            </div>

                           <div class="col-md-6">
                            <div class="form-group">
                                <label for="sampul">Gambar Utama</label>
                                <input type="file" name="sampul" class="form-control" accept="image/*"
                                    onchange="previewImage(this, 'current_sampul_preview')">
                                <!-- Input tersembunyi untuk menyimpan gambar utama saat ini -->
                                <input type="hidden" name="current_sampul" value="{{ $postingan->sampul }}">
                                <!-- Preview gambar utama saat ini -->
                                <img id="current_sampul_preview" src="{{ asset('storage/uploads/' . $postingan->sampul) }}" alt="Current Sampul"
                                    style="max-width: 100%; margin-top: 10px;">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="gambar_pendukung">Gambar Pendukung</label>
                                <input type="file" name="gambar_pendukung[]" class="form-control" multiple
                                    onchange="previewMultipleImages(this, 'current_gambar_pendukung_preview')">
                                <small class="text-danger">Maksimal 15 Gambar</small>
                                <!-- Input tersembunyi untuk menyimpan gambar pendukung saat ini -->
                                <input type="hidden" name="current_gambar_pendukung" value="{{ $postingan->gambar_pendukung }}">
                                <!-- Preview gambar pendukung saat ini -->
                                <div id="current_gambar_pendukung_preview" style="margin-top: 10px;">
                                    @foreach(explode(',', $postingan->gambar_pendukung) as $image)
                                    <img src="{{ asset('storage/uploads/' . $image) }}" alt="Current Gambar Pendukung"
                                        style="max-width: 100%; margin-bottom: 5px;">
                                    @endforeach
                                </div>
                            </div>
                        </div>
                           <!-- Deskripsi -->
                        <div class="form-group">
                            <label for="deskripsi">Deskripsi</label>
                            <textarea class="form-control" id="summernote" cols="30" rows="10" name="deskripsi"
                                required>{{ $postingan->deskripsi }}</textarea>
                        </div>
                        
                        {{-- <div class="form-group">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="highlights" name="highlights" {{ $postingan->highlights ?
                                'checked' : '' }}>
                                <label class="form-check-label" for="highlights">Highlights</label>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="sampai_dengan_tanggal">Sampai dengan Tanggal</label>
                            <input type="date" class="form-control" id="sampai_dengan_tanggal" name="sampai_dengan_tanggal"
                                value="{{ $postingan->sampai_dengan_tanggal ? $postingan->sampai_dengan_tanggal->toDateString() : '' }}">
                            <small class="form-text text-muted">Pilih tanggal jika ingin menetapkan batas waktu.</small>
                        </div> --}}

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




<!-- JavaScript untuk menangani preview gambar -->
<script>
    function previewImage(input, previewId) {
        var preview = document.getElementById(previewId);
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                preview.src = e.target.result;
            }
            reader.readAsDataURL(input.files[0]);
        } else {
            preview.src = "";
        }
    }

    function previewMultipleImages(input, previewId) {
        var preview = document.getElementById(previewId);
        preview.innerHTML = "";
        if (input.files) {
            for (var i = 0; i < input.files.length; i++) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    var image = document.createElement("img");
                    image.src = e.target.result;
                    image.alt = "Preview Gambar Pendukung";
                    image.style.maxWidth = "100%";
                    image.style.marginBottom = "5px";
                    preview.appendChild(image);
                }
                reader.readAsDataURL(input.files[i]);
            }
        }
    }
</script>
@endsection