@extends('layouts.main')
@section('container')
<div class="main-container container-fluid">
    <div class="page-header">
        <h1 class="page-title">Edit Jumbotron</h1>
        <div>
            <div class="breadcrumb">
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            Form Edit Jumbotron
        </div>
        <div class="card-body">
            <form action="{{ route('jumbotron.update', $jumbotron->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="judul">Judul</label>
                    <input type="text" name="judul" value="{{ $jumbotron->judul }}"   class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="teks_button">Teks Pada Tombol</label>
                    <input type="text" name="teks_button" value="{{ $jumbotron->teks_button }}"  class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="link">Link</label>
                    <input type="text" name="link" value="{{ $jumbotron->link }}"  class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="keterangan">Keterangan</label>
                    <textarea name="keterangan" value="{{ $jumbotron->keterangan }}"  class="form-control" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
</div>
@endsection