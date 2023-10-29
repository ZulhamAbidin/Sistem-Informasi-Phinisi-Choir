@extends('layouts.pengunjung.main')

@section('container')

    <div class="main-content mt-0">
        <div class="side-app">
            <div class="main-container">

                <div class="container">
                    <div class="page-header">
                        <h1 class="page-title"> {{ $beritadetail->judul_postingan }}</h1>
                        <div>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0)">Detail</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Berita</li>
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
                        <img class="card-img-top card-img-bottom " src="{{ asset('storage/uploads/' . $beritadetail->sampul) }}"  alt="Card image cap">
                        <div class="card-body">
                            <div class="d-md-flex">
                                <a href="javascript:void(0);" class="d-flex me-4 mb-2"><i
                                        class="fe fe-clock fs-16 me-1 p-3 bg-secondary-transparent text-success bradius"></i>
                                    <div class="mt-3 ms-1 text-muted font-weight-semibold">{{ $beritadetail->selisihWaktu }}
                                    </div>
                                </a>
                                <a href="javascript:void(0);" class="d-flex mb-2 me-4"><i
                                        class="fe fe-camera fs-16 me-1 p-3 bg-secondary-transparent text-success bradius"></i>
                                    <div class="mt-3 ms-1 text-muted font-weight-semibold">{{ $beritadetail->sumber }}</div>
                                </a>
                                <a href="javascript:void(0);" class="d-flex me-4 mb-2"><i
                                        class="fe fe-map fs-16 me-1 p-3 bg-secondary-transparent text-success bradius"></i>
                                    <div class="mt-3 ms-1 text-muted font-weight-semibold">{{ $beritadetail->lokasi }}</div>
                                </a>
                                <a href="javascript:void(0);" class="d-flex me-4 mb-2"><i
                                        class="fe fe-calendar fs-16 me-1 p-3 bg-secondary-transparent text-success bradius"></i>
                                    <div class="mt-3 ms-1 text-muted font-weight-semibold">
                                        {{ $beritadetail->created_at->format('d F Y') }}</div>
                                </a>
                                <a href="javascript:void(0);" class="d-flex me-4 mb-2"><i
                                        class="fe fe-heart fs-16 me-1 p-3 bg-secondary-transparent text-success bradius"></i>
                                    <div class="mt-3 ms-1 text-muted font-weight-semibold">Like
                                        {{ $beritadetail->jumlah_suka }} </div>
                                </a>
                                <a href="javascript:void(0);" class="d-flex me-4 mb-2"><i
                                        class="fe fe-award fs-16 me-1 p-3 bg-secondary-transparent text-success bradius"></i>
                                    <div class="mt-3 ms-1 text-muted font-weight-semibold">Rating
                                        {{ $beritadetail->rating }} </div>
                                </a>
                                <div class="ms-auto">
                                    <a href="javascript:void(0);" class="d-flex mb-2"><i
                                            class="fe fe-message-square fs-16 me-1 p-3 bg-secondary-transparent text-success bradius"></i>
                                        <div class="mt-3 ms-1 text-muted font-weight-semibold">
                                            {{ $beritadetail->komentars_count }} Komentar</div>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <h3><a href="javascript:void(0)"> {{ $beritadetail->judul_postingan }}.</a></h3>
                            <p class="card-text">{{ $beritadetail->deskripsi }}.</p>
                        </div>
                        <div class="card-footer">
                            <div class="email-attch">
                                <p class="font-weight-semibold">Dokumentasi</p>
                            </div>
                            <div class="row attachments-doc">
                                @if ($beritadetail->gambar_pendukung)
                                    @foreach (explode(',', $beritadetail->gambar_pendukung) as $image)
                                        <div class="col-xl-3 col-lg-3 col-md-4 col-sm-4 mb-2 mb-sm-0">
                                            <div class="border overflow-hidden p-0 br-7">
                                                <a href=""><img src="{{ asset('storage/uploads/' . $image) }}"
                                                        class="card-img-top" alt="img"></a>
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
            </div>
        </div>

    @endsection
