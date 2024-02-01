@extends('layouts.main')
@section('container')
<div class="container">
    <div class="main-container container-fluid">
        <div class="page-header">
            <h1 class="page-title">Edit Profile Lembaga</h1>
            <div>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Edit</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Profile Lembaga</li>
                </ol>
            </div>
        </div>
    </div>

    <div class="row justify-content-center mt-4">
        <div class="card">
            <div class="card-body">
                {{-- Gunakan route('profile-lembaga.update') untuk tindakan "Edit" --}}
                <form method="POST"
                    action="{{ $profile ? route('profile-lembaga.update', ['id' => $profile->id]) : route('profile-lembaga.store') }}"
                    enctype="multipart/form-data">
                    @csrf
                    {{-- Tambahkan metode PUT atau PATCH untuk tindakan "Edit" --}}
                    @if ($profile)
                    @method('PUT')
                    @endif

                    <div class="row">

                        <div class="mb-3 col-12 col-md-12">
                            <label for="noponsel" class="form-label">No Ponsel Admin</label>
                            <input type="number" class="form-control" id="noponsel" name="noponsel" required
                                value="{{ $profile ? $profile->noponsel : '' }}">
                        </div>

                        <div class="mb-3 col-12 col-md-12">
                            <label for="body" class="form-label">body</label>
                            <textarea type="text" id="summernote" class="form-control" cols="30" rows="10" name="body"
                                required>{{ $profile ? $profile->body : '' }}</textarea>
                        </div>

                        <div class="mb-3 col-12 col-md-6">
                            <button type="submit" class="btn btn-primary">{{ $profile ? 'Update' : 'Simpan' }}</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

<script>
    $('#summernote').summernote({
        placeholder: 'description...',
        tabsize:2,
        height:300
    });
</script>

@endsection