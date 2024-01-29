{{-- @extends('layouts.pengunjung.main')

@section('container')

    @if ($profiles && $profiles->count() > 0)
    
        @php

            $profile = $profiles->first();

        @endphp
        
        <div class="main-content w-full px-[var(--margin-x)]">

            <div class="grid grid-cols-1 mt-4">
                <div class="col-span-1 card px-5 py-12 sm:px-18">
                    <div>
                        <div class="text-center sm:text-left">
                            <img class="h-11 w-fit mx-auto transition-transform duration-500 rotate-[360deg]"
                                src="{{ asset('assets/images/brand/logo-3.png') }}" alt="logo" />
                            <div class="space-y-1 text-center mt-3 text-md">
                                Unit Kegiatan Paduan Suara Mahasiswa Universitas Negeri Makassar
                            </div>
                            <div class="space-y-1 text-center text-md">
                                Jl. Raya Pendidikan, Gn. Sari, Kec. Rappocini, Kota Makassar, Sulawesi Selatan 90222, Telepon {{ $profile->noponsel }}, Email psm.unm@gmail.com, 
                            </div>
                        </div>
                    </div>
                    <div class="my-7 h-px bg-slate-200 dark:bg-navy-500"></div>
                    <p>{!! $profile->body !!}</p>
                    <div class="my-7 h-px bg-slate-200 dark:bg-navy-500"></div>

                   
                </div>
            </div>

            <div class="col-span-1 card mt-4">
                <div class="card  p-5 sm:mt-0 sm:flex-row btn bg-gradient-to-br from-purple-500 to-indigo-600 text-white">
                    
                    <div class="mt-2 flex-1 pt-2 text-center text-white sm:mt-0 sm:text-left">
                        <h3 class="text-xl">
                            Hadirkan <span class="font-semibold">Pinisi Choir</span> Dalam  Event Anda 
                        </h3>
                        <p class="mt-2 leading-relaxed">
                            <span class="font-semibold">Pinisi Choir</span> UNM merupakan pilihan tepat
                            untuk membuat acara Anda menjadi lebih istimewa. Dengan
                            harmoni suara yang
                            indah, kami siap memberikan pengalaman musik yang tak
                            terlupakan. Dapatkan nuansa berbeda dengan Mengundang
                            <span class="font-semibold">Pinisi Choir</span> UNM
                            untuk meramaikan acara Anda!
                        </p>
                        <a href="https://wa.me/{{ $profile->noponsel }}" target="_blank"
                            class="btn mt-6 bg-slate-50 text-slate-800 hover:bg-slate-200 focus:bg-slate-200 active:bg-slate-200/80">
                            <i class="fa-solid fa-phone text-xs pr-2"></i>Hubungi Kami
                        </A>
                    </div>
                </div>
            </div>

            <div class="col-span-1 text-center card mt-4 py-5">
                <h2 class="text-sm md:text-xl lg:text-xl text-center font-semibold uppercase text-slate-600 dark:text-navy-100">
                    Ayo Berkunjung Ke Tempat Kami
                </h2>
            </div>

            <div class="card mt-4">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3973.597102046322!2d119.43375837409967!3d-5.168327852190021!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dbee329d551a545%3A0x3798c730fc0df0a0!2sPinisi%20Choir!5e0!3m2!1sid!2sid!4v1699896890735!5m2!1sid!2sid"
                    width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>

        </div>

    @else

        <p>Tidak ada data profil lembaga.</p>

    @endif

    @include('layouts.pengunjung.footer')

@endsection --}}
<!doctype html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Zulham Abidin">
    <meta name="author" content="Zulham Abidin">
    <meta name="keywords" content="Zulham Abidin">
    <link href="{{ asset('assets/images/brand/logo-2.png') }}" rel="shortcut icon" type="image/x-icon" />
    <title>HOME</title>
    <link href="{{ asset('assets/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" id="style" />
    {{--
    <link href="{{ asset('assets/css/landingpage.css')}}" rel="stylesheet" /> --}}
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/dark-style.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/colors/color1.css') }}" id="theme" rel="stylesheet" type="text/css"
        media="all" />
</head>
<body class="app ltr landing-page horizontal">

    {{-- <div id="global-loader">
        <img src="{{ asset('assets/images/loader.svg') }}" class="loader-img" alt="Loader">
    </div> --}}

    @include('sweetalert::alert')

    <div class="page">
        <div class="page-main">


            @if ($profiles && $profiles->count() > 0)
            @php
            $profile = $profiles->first();
            @endphp

            <div class="main-content mt-0">
                <div class="side-app">
                    <div class="main-container">

                        <div class="section bg-landing pt-4 px-4" id="Blog">
                            <div class="card">
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
                                                                <h1 class="fw-semibold text-white">Hadirkan Phisi
                                                                    Choir
                                                                    Dalam
                                                                    Event Anda</h1>
                                                                <p class="text-white">Phinisi Choir UNM merupakan
                                                                    pilihan tepat
                                                                    untuk membuat acara Anda menjadi lebih istimewa.
                                                                    Dengan
                                                                    harmoni suara yang
                                                                    indah, kami siap memberikan pengalaman musik
                                                                    yang
                                                                    tak
                                                                    terlupakan. Dapatkan nuansa berbeda dengan
                                                                    Mengundang
                                                                    Phinisi Choir UNM
                                                                    untuk meramaikan acara Anda!
                                                                </p>
                                                            </div>
                                                            <div class="col-12 col-md-12 col-lg-12 text-end my-auto">
                                                                <a href="https://wa.me/{{ $profile->noponsel }}"
                                                                    target="_blank"
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
                                                                                        <p>Jl. Raya Pendidikan, Gn.
                                                                                            Sari, Kec.
                                                                                            Rappocini, Kota
                                                                                            Makassar,
                                                                                            Sulawesi
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
                                                                                            {{ $profile->noponsel }}
                                                                                            <br> (
                                                                                            HUMAS )
                                                                                        </p>

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
                                                                                        <p class="mb-0">
                                                                                            psm.unm@gmail.com</p>
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
                                                                                        <p class="mb-0">Senin -
                                                                                            Jumat:
                                                                                            07.00 -
                                                                                            18.00</p>
                                                                                        <p>Sabtu - Minggu : Hari
                                                                                            Libur
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

                        <div class="bg-image-landing section pb-0" id="Contact">
                            <div class="container">
                                <div class="">
                                    <div class="card card-shadow reveal active">
                                        <h4 class="text-center fw-semibold">Maps</h4>
                                        <span class="landing-title"></span>
                                        <h2 class="text-center fw-semibold mb-0 px-2">Mari Berkunjung Ke Tempat
                                            Kami
                                        </h2>
                                        <div class="card-body pt-6 pb-6 text-dark">
                                            <div class="statistics-info p-4">
                                                <iframe
                                                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3973.597102046322!2d119.43375837409967!3d-5.168327852190021!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dbee329d551a545%3A0x3798c730fc0df0a0!2sPinisi%20Choir!5e0!3m2!1sid!2sid!4v1699896890735!5m2!1sid!2sid"
                                                    width="100%" height="450" style="border:0;" allowfullscreen=""
                                                    loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                            </div>
                                        </div>

                                        <a href="https://www.google.com/maps/search/?api=1&query=Pinisi+Choir"
                                            target="_blank" class="btn btn-primary mt-3">Menuju Google Maps</a>
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
    </div>

    <a href="#top" id="back-to-top"><i class="fa fa-angle-up"></i></a>

        <script>
            function formatNRA(input) {
                // Hapus karakter selain "G" dan angka
                input.value = input.value.replace(/[^G0-9]/gi, '');

                // Pertahankan maksimal dua karakter pertama (huruf "G" dan dua angka)
                let prefix = input.value.substr(0, 2);
                let suffix = input.value.substr(2);

                // Menambahkan tanda "." setiap tiga digit pada angka berikutnya
                suffix = suffix.replace(/(\d)(?=(\d{3})+$)/g, '$1.');

                // Gabungkan kembali
                input.value = prefix + suffix;
            }
        </script>

        @include('sweetalert::alert', ['cdn' => 'https://cdn.jsdelivr.net/npm/sweetalert2@9'])
        <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/bootstrap/js/popper.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/counters/counterup.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/counters/waypoints.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/counters/counters-1.js') }}"></script>
        <script src="{{ asset('assets/plugins/owl-carousel/owl.carousel.js') }}"></script>
        <script src="{{ asset('assets/plugins/company-slider/slider.js') }}"></script>
        <script src="{{ asset('assets/js/sticky.js') }}"></script>
        <script src="{{ asset('assets/js/landing.js') }}"></script>

</body>

</html>
