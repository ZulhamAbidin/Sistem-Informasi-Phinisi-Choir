@extends('layouts.pengunjung.main')

@section('container')
    @if ($profiles && $profiles->count() > 0)
        @php
            $profile = $profiles->first();
        @endphp

        <div class="main-content mt-0">
            <div class="side-app">
                <div class="main-container">

                    <div class="section bg-landing pt-4 px-4" id="Blog">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Tentang PINISI CHOIR</h3>
                            </div>
                            <div class="card-body">
                                <div class="eamil-body mt-5">
                                    <p>{!! $profile->body !!}</p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-md-8 col-xl-8 mx-auto">
                                <div class="testimonial-owl-landing buynow-landing reveal revealrotate active">
                                    <div class="row pt-6 pb-6">
                                        <div class="col-md-12 mx-auto">
                                            <div class="card bg-transparent">
                                                <div class="card-body pt-5 pb-5 px-7">
                                                    <div class="row">
                                                        <div class="col-12 col-md-12 col-lg-12">
                                                            <h1 class="fw-semibold text-white">Hadirkan Phisi Choir Dalam
                                                                Event Anda</h1>
                                                            <p class="text-white">Phinisi Choir UNM merupakan pilihan tepat
                                                                untuk membuat acara Anda menjadi lebih istimewa. Dengan
                                                                harmoni suara yang
                                                                indah, kami siap memberikan pengalaman musik yang tak
                                                                terlupakan. Dapatkan nuansa berbeda dengan Mengundang
                                                                Phinisi Choir UNM
                                                                untuk meramaikan acara Anda!
                                                            </p>
                                                        </div>
                                                        <div class="col-12 col-md-12 col-lg-12 text-end my-auto">
                                                            <a href="https://wa.me/{{ $profile->noponsel }}" target="_blank"
                                                                class="btn btn-pink w-lg pt-2 pb-2"><i
                                                                    class="fa fa-whatsapp me-2"></i>Hubungi Kami
                                                            </a>
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

                    <div class="bg-image-landing section pb-0" id="Contact">
                        <div class="container">
                            <div class="">
                                <div class="card card-shadow reveal active">
                                    <h4 class="text-center fw-semibold mt-7">Contact</h4>
                                    <span class="landing-title"></span>
                                    <h2 class="text-center fw-semibold mb-0 px-2">Hubungi Kami <span
                                            class="text-primary">US.</span>
                                    </h2>
                                    <div class="card-body pt-6 pb-6 text-dark">
                                        <div class="statistics-info p-4">
                                            <div class="row justify-content-center">
                                                <div class="col-lg-9">
                                                    <div class="mt-3">
                                                        <div class="text-dark">
                                                            <div class="services-statistics reveal my-5 active">
                                                                <div class="row text-center">
                                                                    <div class="col-xl-3 col-md-6 col-lg-6">
                                                                        <div class="card">
                                                                            <div class="card-body p-0">
                                                                                <div class="counter-status">
                                                                                    <div
                                                                                        class="counter-icon bg-primary-transparent box-shadow-primary">
                                                                                        <i
                                                                                            class="fe fe-map-pin text-primary fs-23"></i>
                                                                                    </div>
                                                                                    <h4 class="mb-2 fw-semibold">
                                                                                        Alamat</h4>
                                                                                    <p>Jl. Raya Pendidikan, Gn. Sari, Kec.
                                                                                        Rappocini, Kota Makassar, Sulawesi
                                                                                        Selatan 90222 </p>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-xl-3 col-md-6 col-lg-6">
                                                                        <div class="card">
                                                                            <div class="card-body p-0">
                                                                                <div class="counter-status">
                                                                                    <div
                                                                                        class="counter-icon bg-secondary-transparent box-shadow-secondary">
                                                                                        <i
                                                                                            class="fe fe-headphones text-secondary fs-23"></i>
                                                                                    </div>
                                                                                    <h4 class="mb-2 fw-semibold">
                                                                                        Phone </h4>
                                                                                    <p class="mb-0">
                                                                                        {{ $profile->noponsel }} <br> (
                                                                                        HUMAS ) </p>

                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-xl-3 col-md-6 col-lg-6">
                                                                        <div class="card">
                                                                            <div class="card-body p-0">
                                                                                <div class="counter-statuss">
                                                                                    <div
                                                                                        class="counter-icon bg-success-transparent box-shadow-success">
                                                                                        <i
                                                                                            class="fe fe-mail text-success fs-23"></i>
                                                                                    </div>
                                                                                    <h4 class="mb-2 fw-semibold">
                                                                                        Contact</h4>
                                                                                    <p class="mb-0">psm.unm@gmail.com</p>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-xl-3 col-md-6 col-lg-6">
                                                                        <div class="card">
                                                                            <div class="card-body p-0">
                                                                                <div class="counter-status">
                                                                                    <div
                                                                                        class="counter-icon bg-danger-transparent box-shadow-danger">
                                                                                        <i
                                                                                            class="fe fe-airplay text-danger fs-23"></i>
                                                                                    </div>
                                                                                    <h4 class="mb-2 fw-semibold">
                                                                                        Jam Kerja</h4>
                                                                                    <p class="mb-0">Senin - Jumat: 07.00 -
                                                                                        18.00</p>
                                                                                    <p>Sabtu - Minggu : Hari Libur
                                                                                    </p>
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
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>


            </div>
        </div>
    @else
        <p>Tidak ada data profil lembaga.</p>
    @endif
@endsection
