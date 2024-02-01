@extends('layouts.main')
@section('container')
<div class="main-container container-fluid">
    <div class="page-header">
        <h1 class="page-title">Tambah Jumbotron</h1>
        <div>
            <div class="breadcrumb">
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            Form Tambah Jumbotron
        </div>
        <div class="card-body">
            <form action="{{ route('jumbotron.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="judul">Judul</label>
                    <input type="text" name="judul" placeholder="PENDAFTARAN ANGGOTA BARU TELAH DIBUKA!!" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="teks_button">Teks Pada Tombol</label>
                    <input type="text" name="teks_button" placeholder="DAFTAR SEKARANG!!" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="link">Link</label>
                    <input type="text" name="link" placeholder="link pendaftaran goggle form" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="keterangan">Keterangan</label>
                    <textarea name="keterangan" placeholder="" class="form-control" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
</div>
@endsection