@extends('layouts.main')
@section('container')
    <div class="main-container container-fluid">
        <div class="page-header">
            <h1 class="page-title">Lihat Data {{ $anggota->nama_lengkap }}</h1>
            <div>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('superadmin.home.index') }}">Lihat</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Data {{ $anggota->nama_lengkap }}</li>
                </ol>
            </div>
        </div>
    </div>

    <div class="row justify-content-center mt-4">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="wideget-user mb-2">
                        <div class="row">
                            <div class="col-lg-12 col-md-12">
                                <div class="row">
                                    <div class="panel profile-cover">
                                        <div class="profile-cover__action bg-img"></div>
                                        <div class="profile-cover__img">
                                            <div class="profile-img-1">
                                                <img src="{{ asset('storage/uploads/' . $anggota->foto) }}" alt="img">
                                            </div>
                                            <div class="profile-img-content text-dark text-start">
                                                <div class="text-dark">
                                                    <h3 class="h3 mb-2">{{ $anggota->nama_lengkap }}</h3>
                                                    <h5 class="text-muted">{{ $anggota->jabatan }}</h5>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- <div class="btn-profile">
                                            <a href="https://wa.me/{{ $anggota->notelfon }}" class="btn btn-outline-primary mt-1 mb-1"> <i class="fa fa-whatsapp"></i>
                                                <span>Hubungi Secara Personal</span></a>

                                        </div> --}}
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="px-0 px-sm-4">
                                        <div class="social social-profile-buttons mt-5 float-end">
                                            <div class="mt-3">
                                                <a href="https://wa.me/{{ $anggota->notelfon }}" class="social-icon text-primary"  target="_blank"><i
                                                        class="fa fa-whatsapp"></i></>
                                                <a class="social-icon text-primary" href="https://twitter.com/" target="_blank"><i
                                                        class="fa fa-twitter"></i></a>
                                                <a class="social-icon text-primary" href="https://www.youtube.com/" target="_blank"><i
                                                        class="fa fa-youtube"></i></a>
                                                <a class="social-icon text-primary" href="javascript:void(0)"><i class="fa fa-rss"></i></a>
                                                <a class="social-icon text-primary" href="https://www.linkedin.com/" target="_blank"><i
                                                        class="fa fa-linkedin"></i></a>
                                                <a class="social-icon text-primary" href="https://myaccount.google.com/" target="_blank"><i
                                                        class="fa fa-google-plus"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                
                        </div>
                    </div>
                </div>
                

                <div class="card-body">
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <div class="mb-3">
                                <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
                                <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap"
                                    value="{{ $anggota->nama_lengkap }}" readonly>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="mb-3">
                                <label for="nra" class="form-label">NRA</label>
                                <input type="text" class="form-control" id="nra" name="nra" value="{{ $anggota->nra }}"
                                    readonly>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="mb-3">
                                <label for="generasi" class="form-label">Generasi</label>
                                <input type="text" class="form-control" id="generasi" name="generasi" value="{{ $anggota->generasi }}"
                                    readonly>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="mb-3">
                                <label for="alamat" class="form-label">Alamat</label>
                                <input type="text" class="form-control" id="alamat" name="alamat" value="{{ $anggota->alamat }}"
                                    readonly>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="mb-3">
                                <label for="notelfon" class="form-label">Nomor Telepon</label>
                                <input type="text" class="form-control" id="notelfon" name="notelfon" value="{{ $anggota->notelfon }}"
                                    readonly>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="mb-3">
                                <label for="motto" class="form-label">Motto</label>
                                <input type="text" class="form-control" id="motto" name="motto" value="{{ $anggota->motto }}" readonly>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-3">
                                <label for="deskripsi" class="form-label">Deskripsi</label>
                                <textarea class="form-control" id="deskripsi" name="deskripsi" rows="10"
                                    readonly>{{ $anggota->deskripsi }}</textarea>
                            </div>
                        </div>
                        <div class="col-12 mb-3">
                            <a href="{{ route('dataanggota.index') }}" class="btn btn-primary">Kembali</a>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
@endsection
