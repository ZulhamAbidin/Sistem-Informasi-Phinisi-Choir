@extends('layouts.main')
@section('container')
    <div class="main-container container-fluid">

        <div class="page-header">
            <h1 class="page-title">Postingan {{ $postingan->judul_postingan }}</h1>
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
            <div class="card-body">
                <div class="email-media">
                    <div class="mt-0 d-sm-flex">
                        <img class="me-2 rounded-circle avatar avatar-lg"
                            src="{{ asset('assets/images/brand/logo-2.png') }}" alt="avatar">
                        <div class="media-body pt-0">
                            <div class="float-end d-none d-md-flex fs-15">
                                <small class="me-3 mt-3 text-muted">Diunggah {{ $postingan->selisihWaktu }}</small>
                                <a href="javascript:void(0)" class="me-3 email-icon text-primary bg-primary-transparent"
                                    data-bs-toggle="tooltip" title="" data-bs-original-title="Rated"
                                    aria-label="Rated"><i class="fe fe-star"></i></a>
                                <a href="javascript:void(0)" class="me-3 email-icon text-secondary bg-secondary-transparent"
                                    data-bs-toggle="tooltip" title="" data-bs-original-title="Reply"
                                    aria-label="Reply"><i class="fa fa-reply"></i></a>
                                <div class="me-3">
                                    <a href="javascript:void(0)" class="text-danger email-icon bg-danger-transparent"
                                        data-bs-toggle="dropdown" role="button" aria-haspopup="true"
                                        aria-expanded="false"><i class="fe fe-more-horizontal"></i></a>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <a class="dropdown-item" href="javascript:void(0)"><i class="fe fe-share me-2"></i>
                                            Reply</a>
                                        <a class="dropdown-item" href="javascript:void(0)"><i
                                                class="fe fe-alert-circle me-2"></i>Report Spam</a>
                                        <a class="dropdown-item" href="javascript:void(0)"><i
                                                class="fe fe-trash me-2"></i>Delete</a>
                                        <a class="dropdown-item" href="javascript:void(0)"><i
                                                class="fe fe-printer me-2"></i>Print</a>
                                        <a class="dropdown-item" href="javascript:void(0)"><i
                                                class="fe fe-filter me-2"></i>Filter</a>
                                    </div>
                                </div>
                            </div>
                            <div class="media-title text-dark font-weight-semibold mt-1">{{ $postingan->sumber }}</div>
                            <small class="mb-0">di {{ $postingan->lokasi }}</small><br>
                            <small class="me-2 my-element">Source: {{ $postingan->sumber }}
                                #{{ $postingan->kategori }}</small>
                            <small class="me-2 d-md-none">Source: {{ $postingan->sumber }}
                                #{{ $postingan->kategori }}</small>
                        </div>
                    </div>
                </div>
                <div class="eamil-body mt-5">

                    <a href="javascript:void(0)"><img src="{{ asset('storage/uploads/' . $postingan->sampul) }}"
                            alt="img" class="br-5 w-100"></a><br>
                    <h2 class="text-center mt-5 mb-5 text-capitalize">{{ $postingan->judul_postingan }}</h2>
                    <p class="text-justify">{{ $postingan->deskripsi }}</p>
                    <br><br>
                    <small class="mb-0">Diunggah Oleh {{ $postingan->sumber }} {{ $postingan->selisihWaktu }} di
                        {{ $postingan->lokasi }} </small>
                    <hr>
                    <div class="email-attch">
                        <p class="font-weight-semibold">Dokumentasi</p>
                    </div>
                    <div class="row attachments-doc">
                        @if ($postingan->gambar_pendukung)
                            @foreach (explode(',', $postingan->gambar_pendukung) as $image)
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
@endsection
