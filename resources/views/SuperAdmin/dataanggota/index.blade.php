@extends('layouts.main')
@section('container')

<div class="main-container container-fluid">
    <div class="page-header">
        <h1 class="page-title">Lihat Data Anggota</h1>
        <div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Lihat</a></li>
                <li class="breadcrumb-item active" aria-current="page">Data Anggota</li>
            </ol>
        </div>
    </div>
</div>


<div class="row justify-content-center mt-4">
    <div class="row row-cols-4">

        @foreach ($anggota as $anggotas)
        <div class="col-md-6 col-xl-4 col-sm-6">
            <div class="card">
                <div class="product-grid6">
                    <div class="product-image6 p-5">
                        <ul class="icons">
                            <li>
                                <a href="{{ route('detail.anggota', ['id' => $anggotas->id]) }}" class="btn btn-primary"> <i class="fe fe-eye"> </i> </a>
                            </li>
                            <li><a href="" class="btn btn-success"><i class="fe fe-edit"></i></a></li>
                            <li>
                                <form method="POST" action="{{ route('dataanggota.destroy', $anggotas->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data anggota ini?')"><i class="fe fe-x"></i></button>
                                </form>
                            </li>
                        </ul>
                        <a href="{{ route('detail.anggota', ['id' => $anggotas->id]) }}">
                            <img class="rounded-circle d-block mx-auto" style="width: 100px; height: 100px; object-fit: cover;"
                                src="{{ asset('storage/uploads/' . $anggotas->foto) }}" alt="img">
                        </a>
                    </div>
                    <div class="card-body pt-0 pb-0">
                        <div class="product-content text-center">
                            <h1 class="title fw-bold fs-20"><a href="#">{{ $anggotas->nama_lengkap }}</a></h1>
                             <p class="">{{ $anggotas->nama_lengkap }} </p>
                        </div>
                    </div>
                    <div class="card-footer text-center">
                        <a href="{{ route('detail.anggota', ['id' => $anggotas->id]) }}" class="btn btn-primary mb-1"><i class="fe fe fe-eye mx-2"></i>Lihat Detail</a>
                    </div>
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

