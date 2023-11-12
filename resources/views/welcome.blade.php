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
                                                                            href="{{ route('pengunjung.news.show', $postingan->id) }}">
                                                                            Lihat
                                                                            Postingan</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="mt-4">
                                                            <div class="d-flex">
                                                                <a href="{{ route('pengunjung.news.show', $postingan->id) }}"
                                                                    class="w-100"><img
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

                {{-- TESTIMONIALS --}}
                <div class="testimonial-owl-landing section pb-0" id="testimonials">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card bg-transparent">
                                    <div class="card-body pt-5">
                                        <h4 class="text-center fw-semibold text-white-80">Testimonials </h4>
                                        <span class="landing-title"></span>
                                        <h3 class="text-center fw-semibold text-white-80 mb-7">Bagaimana Pendapat Orang Mengenai Pinisi Choir</h3>
                                        <div class="testimonial-carousel">
                                            @foreach ($testimonials as $testimonial)
                                                <div class="slide text-center">
                                                    <div class="row">
                                                        <div class="col-xl-8 col-md-12 d-block mx-auto">
                                                            <div class="testimonia">
                                                                <p class="text-white-80">
                                                                    "{{ $testimonial->content }}"
                                                                </p>
                                                                <h3 class="title">{{ $testimonial->name }}</h3>
                                                                <span class="post mb-4">{{ $testimonial->jabatan }}</span>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <img class="rounded-circle d-block mx-auto" src="{{ asset('storage/uploads/' . $testimonial->foto) }}"  style="width: 120px; height: 120px; object-fit: cover;" alt="{{ $testimonial->name }}">
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- SARAN DAN TANGGAPAN PENGGUNA --}}
                <div class="bg-image-landing section pb-0" id="Contact">
                    <div class="container">
                        <div class="">
                            <div class="card card-shadow reveal active">
                                <h4 class="text-center fw-semibold mt-7">Saran dan Tanggapan Penngguna</h4>
                                <span class="landing-title"></span>
                                </h2>
                                <div class="card-body p-5 pb-6 text-dark">
                                    <div class="statistics-info p-4">
                                        <div class="row justify-content-center">

                                            <div class="col-xl-9">
                                                <div class="">
                                                    <form class="form-horizontal reveal revealrotate m-t-20" action="{{ route('submit-saran') }}" method="post">
                                                        @csrf
                                                        <div class="form-group">
                                                            <div class="col-xs-12">
                                                                <input class="form-control" type="text" required="" placeholder="Username*" name="nama">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="col-xs-12">
                                                                <input class="form-control" type="email" required="" placeholder="Email*" name="email">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="col-xs-12">
                                                                <textarea class="form-control" rows="5" placeholder="Your Comment*" name="pesan"></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="">
                                                            <button type="submit" class="btn btn-primary btn-rounded waves-effect waves-light">Submit</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>


    @endsection