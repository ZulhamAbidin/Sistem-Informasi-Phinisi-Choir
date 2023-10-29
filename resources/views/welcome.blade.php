@extends('layouts.pengunjung.main')

@section('container')

    @include('layouts.pengunjung.slider')

    <div class="main-content mt-0">
        <div class="side-app">
            <div class="main-container">

                {{-- POSTINGAN DENGAN RATING TERTINGGI --}}
                <div class="section bg-landing" id="Blog">
                    <div class="container">
                        <div class="row">
                            <div class="card-body">
                                <h4 class="text-center fw-semibold">Postingan Dengan Rating Tertinggi </h4>
                                <span class="landing-title"></span>
                                <h2 class="text-center fw-semibold mb-7">Postingan</h2>
                                @if (!is_null($posts) && count($posts) > 0)
                                    <div class="row">
                                        @foreach ($posts as $postingan)
                                            <div class="col-12 col-md-6 col-lg-4 reveal revealrotate active">
                                                <div class="card border p-0 shadow-none">
                                                    <div class="card-body">
                                                        <div class="d-flex">
                                                            <div class="media mt-0">
                                                                <div class="media-user me-2">
                                                                    <div class=""><img alt=""
                                                                            class="rounded-circle avatar avatar-md"
                                                                            src="{{ asset('assets/images/brand/logo-2.png') }}">
                                                                    </div>
                                                                </div>
                                                                <div class="media-body">
                                                                    <h6 class="mb-0 mt-1">
                                                                        Admin</h6>
                                                                    <small
                                                                        class="text-muted">{{ $postingan->selisihWaktu }}</small>
                                                                </div>
                                                            </div>
                                                            <div class="ms-auto">
                                                                <div class="dropdown show">
                                                                    <a class="new option-dots" href="JavaScript:void(0);"
                                                                        data-bs-toggle="dropdown">
                                                                        <span class=""><i
                                                                                class="fe fe-more-vertical"></i></span>
                                                                    </a>
                                                                    <div class="dropdown-menu dropdown-menu-end">
                                                                        <a class="dropdown-item"
                                                                            href="{{-- {{ route('admin.postingan.show', $postingan->id) }} --}}">
                                                                            Lihat
                                                                            Postingan</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="mt-4">
                                                            <div class="d-flex">
                                                                <a href="{{-- {{ route('admin.postingan.show', $postingan->id) }} --}}" class="w-100"><img
                                                                        src="{{ asset('storage/uploads/' . $postingan->sampul) }}"
                                                                        alt="img" class="br-5"></a>
                                                            </div>
                                                            <h4 class="fw-semibold mt-3">
                                                                {{ Str::limit($postingan->judul_postingan, 30) }}
                                                            </h4>
                                                            <p class="mb-0">
                                                                {{ Str::limit($postingan->deskripsi, 150) }}</p>
                                                        </div>
                                                    </div>



                                                    <div class="card-footer user-pro-2">
                                                        <div class="media mt-0">
                                                            <div class="media-body">
                                                                <h6 class="mb-0 mt-2 ms-2">
                                                                    {{ $postingan->jumlah_suka }} Menyukai
                                                                    Postingan
                                                                    Ini</h6>
                                                            </div>
                                                            <div class="ms-auto">
                                                                <div class="d-flex mt-1">
                                                                    <a class="new me-2 text-muted fs-16"
                                                                        href="JavaScript:void(0);"><span class=""><i
                                                                                class="fe fe-heart"></i></span></a>
                                                                    <a class="new me-2 text-muted fs-16"
                                                                        href="JavaScript:void(0);"><span class=""><i
                                                                                class="fe fe-message-square"></i></span></a>
                                                                    <a class="new text-muted fs-16"
                                                                        href="JavaScript:void(0);"><span class=""><i
                                                                                class="fe fe-share-2"></i></span></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                @else
                                    <p>Anda Belum Mengunggah Postingan Apapun.</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>


            </div>

        </div>


    @endsection
