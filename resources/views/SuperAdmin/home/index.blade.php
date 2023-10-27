@extends('layouts.main')
@section('container')

    <div class="main-container container-fluid">
        <div class="page-header">
            <h1 class="page-title">Kelola Slider</h1>
            <div>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('superadmin.home.index') }}">Slider</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Kelola Slider</li>
                </ol>
            </div>
        </div>
    </div>

    <div class="row justify-content-center mt-4">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        @foreach ($carousels as $carousel)
                            <div class="col-12 col-md-6 col-lg-4">

                                <div class="card-body">
                                    <div class="d-flex">
                                        <div class="media mt-0">
                                            <div class="media-user me-2">
                                                <div class=""><img alt=""
                                                        class="rounded-circle avatar avatar-md"
                                                        src="{{ asset('assets/images/brand/logo-2.png') }}"></div>
                                            </div>
                                            <div class="media-body">
                                                <h6 class="mb-0 mt-1">Slider</h6>
                                                <small
                                                    class="text-muted">{{ $carousel->created_at->format('d F Y H:i') }}</small>
                                            </div>
                                        </div>

                                        <div class="ms-auto">
                                            <div class="dropdown show">
                                                <a class="new option-dots" href="JavaScript:void(0);"
                                                    data-bs-toggle="dropdown">
                                                    <span class=""><i class="fe fe-more-vertical"></i></span>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <a class="dropdown-item"
                                                        href="{{ route('superadmin.home.edit', $carousel->id) }}">Ganti
                                                        Gambar </a>
                                                    <form action="{{ route('superadmin.home.destroy', $carousel->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="dropdown-item">Hapus</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-4">
                                        <div class="d-flex">
                                            <a href="" class="w-100"><img
                                                    src="{{ asset('storage/uploads/' . $carousel->image_path) }}"
                                                    alt="img" class="br-5"></a>
                                        </div>
                                        <h4 class="fw-semibold mt-3">{{ $carousel->title }}</h4>
                                        <p class="mb-0">{{ Str::limit($carousel->description, 150) }}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">

                    <div id="carousel-captions" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            @foreach ($carousels as $key => $carousel)
                                <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                    <img class="d-block w-100 br-5" alt=""
                                        src="{{ asset('storage/uploads/' . $carousel->image_path) }}"
                                        data-bs-holder-rendered="true">
                                    <div class="carousel-item-background d-none d-md-block"></div>
                                    <div class="carousel-caption d-none d-md-block">
                                        <h3>{{ $carousel->title }}</h3>
                                        <p>{{ $carousel->description }}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <a class="carousel-control-prev" href="#carousel-captions" role="button" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carousel-captions" role="button" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>

                </div>
            </div>
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
