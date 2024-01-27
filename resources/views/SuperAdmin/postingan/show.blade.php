@extends('layouts.main')
@section('container')
    <div class="main-container container-fluid">

        <div class="page-header">
            <h1 class="page-title"> {{ $postingan->judul_postingan }}</h1>
            <div>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Postingan</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Detail Postingan</li>
                </ol>
            </div>
        </div>

        <style>
            @media (max-width: 767px) {
                .my-element {
                    display: none !important;
                }
            }

            @media (min-width: 768px) and (max-width: 2500px) {
                .my-element {
                    display: block !important;
                }
            }
        </style>

        <div class="card">
            <img class="card-img-top " src="{{ asset('storage/uploads/' . $postingan->sampul) }}"
                alt="Card image cap">
            <div class="card-body">
                <div class="d-md-flex">
                    <a href="javascript:void(0);" class="d-flex me-4 mb-2"><i
                            class="fe fe-clock fs-16 me-1 p-3 bg-secondary-transparent text-success bradius"></i>
                        <div class="mt-3 ms-1 text-muted font-weight-semibold">{{ $postingan->selisihWaktu }}
                        </div>
                    </a>
                    <a href="javascript:void(0);" class="d-flex me-4 mb-2"><i
                            class="fe fe-map fs-16 me-1 p-3 bg-secondary-transparent text-success bradius"></i>
                        <div class="mt-3 ms-1 text-muted font-weight-semibold">{{ $postingan->lokasi }}</div>
                    </a>
                    <a href="javascript:void(0);" class="d-flex me-4 mb-2"><i
                            class="fe fe-calendar fs-16 me-1 p-3 bg-secondary-transparent text-success bradius"></i>
                        <div class="mt-3 ms-1 text-muted font-weight-semibold">
                            {{ $postingan->created_at->format('d F Y') }}</div>
                    </a>
                    <a href="javascript:void(0);" class="d-flex me-4 mb-2"><i
                            class="fe fe-heart fs-16 me-1 p-3 bg-secondary-transparent text-success bradius"></i>
                        <div class="mt-3 ms-1 text-muted font-weight-semibold">Like
                            {{ $postingan->jumlah_suka }} </div>
                    </a>
                    <a href="javascript:void(0);" class="d-flex me-4 mb-2"><i
                            class="fe fe-award fs-16 me-1 p-3 bg-secondary-transparent text-success bradius"></i>
                        <div class="mt-3 ms-1 text-muted font-weight-semibold">Rating
                            {{ $postingan->rating }} </div>
                    </a>
                    <a href="javascript:void(0);" class="d-flex me-4 mb-2"><i
                            class="fe fe-camera fs-16 me-1 p-3 bg-secondary-transparent text-success bradius"></i>
                        <div class="mt-3 ms-1 text-muted font-weight-semibold">
                            {{ $postingan->sumber }} </div>
                    </a>
                    <div class="ms-auto">
                        <a href="javascript:void(0);" class="d-flex mb-2"><i
                                class="fe fe-message-square fs-16 me-1 p-3 bg-secondary-transparent text-success bradius"></i>
                            <div class="mt-3 ms-1 text-muted font-weight-semibold">
                                {{ $postingan->komentars_count }} Komentar</div>
                        </a>
                    </div>
                </div>
            </div>
            {{-- <div class="media-body">
                <h6 class="mb-0 mt-1">{{ $postingan->judul_postingan }}</h6>
                <small class="text-muted">{{ $postingan->sumber }}</small>
            </div> --}}
            <div class="card-body">
                <h3><a href="javascript:void(0)"> {{ $postingan->judul_postingan }}.</a></h3>
                <p class="card-text">{!! $postingan->deskripsi !!}</p>
            </div>
            <div class="card-footer">
                {{-- <small class="text-muted">Sumber : {{ $postingan->sumber }} {{ $postingan->selisihWaktu }}</small> --}}
                <div class="email-attch">
                    <p class="font-weight-semibold">Dokumentasi</p>
                </div>
                <div class="row attachments-doc">
                    @if ($postingan->gambar_pendukung)
                    @foreach (explode(',', $postingan->gambar_pendukung) as $image)
                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-4 mb-2 mb-sm-0">
                        <div class="border overflow-hidden p-0 br-7">
                            <a href=""><img src="{{ asset('storage/uploads/' . $image) }}" class="card-img-top" alt="img"></a>
                        </div>
                    </div>
                    @endforeach
                    @else
                    Tidak ada gambar pendukung
                    @endif
        
                </div>
            </div>
        
        </div>

    </div>
@endsection
