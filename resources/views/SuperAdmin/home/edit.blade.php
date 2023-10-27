@extends('layouts.main')

@section('container')
<div class="main-container container-fluid">
    <div class="page-header">
        <h1 class="page-title">Edit Carousel</h1>
        <div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('superadmin.home.index') }}">Carousel</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit Carousel</li>
            </ol>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <form action="{{ route('superadmin.home.update', $carousel->id) }}" method="POST"
                enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="row">
                    <div class="col-6">
                        <div class="mb-3">
                            <label for="title" class="form-label">Title</label>
                            <textarea class="form-control" id="title" rows="2"
                                name="title">{{ $carousel->title }}</textarea>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control" id="description" rows="2"
                                name="description">{{ $carousel->description }}</textarea>
                        </div>
                    </div>
                    <div class="col-12 mb-3">
                        <label for="image" class="form-label">Unggah Gambar Baru</label>
                        <input type="file" class="form-control" id="image" name="image"
                            onchange="previewImage(this)">
                    </div>
                    <div class="col-6">
                        <div class="mb-3">
                            <label for="image" class="form-label">Preview Gambar Lama</label>
                            <img src="{{ asset('storage/uploads/' . $carousel->image_path) }}" alt="Current Image"
                                class="img-thumbnail">
                        </div>
                    </div>
                    <div class="col-6 mb-3">
                        <label class="form-label">Preview Gambar Baru</label>
                        <img id="image-preview" src="" alt="Preview Gambar Tidak Ada" style="max-width: 100%">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
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