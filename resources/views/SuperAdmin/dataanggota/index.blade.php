@extends('layouts.main')
@section('container')

<div class="main-container container-fluid">
    <div class="page-header">
        <h1 class="page-title">Lihat Data Anggota</h1>
        <div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('superadmin.home.index') }}">Lihat</a></li>
                <li class="breadcrumb-item active" aria-current="page">Data Anggota</li>
            </ol>
        </div>
    </div>
</div>


<div class="row justify-content-center mt-4">
    <div class="row row-cols-4">

        @foreach ($anggota as $anggotas)
         
        <div class="col-xl-3 col-sm-6 col-md-6">
            <div class="card border p-0">
                <div class="card-body text-center">
                    <span class="avatar avatar-xxl brround cover-image" data-bs-image-src="{{ asset('storage/uploads/' . $anggotas->foto) }}" style="background: url(&quot;{{ asset('storage/uploads/' . $anggotas->foto) }}&quot;) center center;"></span>
                    <h4 class="h4 mb-0 mt-3">{{ $anggotas->nama_lengkap }}</h4>
                    <p class="card-text">{{ $anggotas->jabatan }}</p>
                </div>
                <div class="card-footer text-center">
                    <div class="row user-social-detail">
                        <div class="social-profile me-4 rounded text-center">
                            <a href="{{ $anggotas->tautan_facebook }}"><i class="fa fa-facebook"></i></a>
                        </div>
                        <div class="social-profile me-4 rounded text-center">
                            <a href="https://wa.me/{{ $anggotas->notelfon }}"><i class="fa fa-whatsapp"></i></a>
                        </div>
                        <div class="social-profile me-4 rounded text-center">
                            <a href="{{ $anggotas->tautan_twitter }}"><i class="fa fa-twitter"></i></a>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-center">
                    <a href="{{ route('detail.anggota', ['id' => $anggotas->id]) }}" class="btn btn-block btn-primary btn-sm">Lihat Profil Lengkap</a>
                </div>
            </div>
        </div>

        @endforeach

    </div>
</div>

@endsection

@push('scripts')
<script>
    @if (session('success'))
            Swal.fire('Sukses', '{{ session('success') }}', 'success');
        @endif

        @if (session('error'))
            Swal.fire('Error', '{{ session('error') }}', 'error');
        @endif
</script>
@endpush