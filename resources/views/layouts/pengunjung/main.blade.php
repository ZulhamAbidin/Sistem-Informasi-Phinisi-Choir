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
    <link href="{{ asset('assets/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" id="style" />
    <link href="{{ asset('assets/css/landingpage.css')}}" rel="stylesheet" />
    <link href="{{ asset('assets/css/style.css')}}" rel="stylesheet" />
    <link href="{{ asset('assets/css/dark-style.css')}}" rel="stylesheet" />
    <link href="{{ asset('assets/css/icons.css')}}" rel="stylesheet" />
    <link href="{{ asset('assets/colors/color1.css') }}" id="theme" rel="stylesheet" type="text/css" media="all" />
</head>

<body class="app ltr landing-page horizontal">

    <div id="global-loader">
        <img src="{{ asset('assets/images/loader.svg') }}" class="loader-img" alt="Loader">
    </div>

    @include('sweetalert::alert')

    <div class="page">
        <div class="page-main">
            <div class="hor-header header">
                <div class="container main-container">
                    <div class="d-flex">
                        <a aria-label="Hide Sidebar" class="app-sidebar__toggle" data-bs-toggle="sidebar"
                            href="javascript:void(0)"></a>
                        <a class="logo-horizontal " href="{{ route('welcome') }}">
                            <img src="{{ asset('assets/images/brand/logo.png') }}" class="header-brand-img desktop-logo" alt="logaaao">
                            <img src="{{ asset('assets/images/brand/logo-3.png') }}" class="header-brand-img light-logo1"
                                alt="sslogo">
                        </a>

                        <div class="d-flex order-lg-2 ms-auto header-right-icons">
                            <button class="navbar-toggler navresponsive-toggler d-lg-none ms-auto" type="button"
                                data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent-4"
                                aria-controls="navbarSupportedContent-4" aria-expanded="false"
                                aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon fe fe-more-vertical"></span>
                            </button>
                            <div class="navbar navbar-collapse responsive-navbar p-0">
                                <div class="collapse navbar-collapse bg-white px-0" id="navbarSupportedContent-4">
                                    <div class="header-nav-right p-5">
                                        @if(auth()->check())
                                        <a href="{{ route('admin.postingan.index') }}"
                                            class="btn ripple btn-min w-sm btn-outline-primary me-2 my-auto">Dashboard
                                        </a>
                                        @else
                                        <a href="{{ route('login') }}"
                                            class="btn ripple btn-min w-sm btn-primary me-2 my-auto">Login
                                        </a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="landing-top-header overflow-hidden">
                <div class="top sticky overflow-hidden">
                    <div class="app-sidebar__overlay" data-bs-toggle="sidebar"></div>
                        <div class="app-sidebar bg-transparent horizontal-main">
                            <div class="container">
                                <div class="row">
                                    <div class="main-sidemenu navbar px-0">
                                        <a class="navbar-brand ps-0 d-none d-lg-block" href="{{ route('welcome') }}">
                                            <img alt="" class="logo-2" src="{{ asset('assets/images/brand/logo-3.png')}}">
                                            <img src="{{ asset('assets/images/brand/logo.png')}}" class="logo-3" alt="logaao">
                                        </a>
                                        <ul class="side-menu">
                                            <li class="slide">
                                                <a class="bok active" data-bs-toggle="slide" href="{{ route('welcome') }}"><span class="side-menu__label">Home</span></a>
                                            </li>
                                            <li class="slide">
                                                <a class="bok" data-bs-toggle="slide" href="{{ route('ListBerita') }}"><span class="side-menu__label">News</span></a>
                                            </li>
                                            <li class="slide">
                                                <a class="bok" data-bs-toggle="slide" href="{{ route('ListCompetition') }}"><span class="side-menu__label">Competition</span></a>
                                            </li>
                                            <li class="slide">
                                                <a class="bok" data-bs-toggle="slide" href="{{ route('ListAchievement') }}"><span class="side-menu__label">Achievement</span></a>
                                            </li>
                                            <li class="slide">
                                                <a class="bok" data-bs-toggle="slide" href="{{ route('welcome') }}#testimonials"><span class="side-menu__label">Testimonials</span></a>
                                            </li>
                                            <li class="slide">
                                                <a class="bok" data-bs-toggle="slide" href="{{ route('about') }}"><span class="side-menu__label">About</span></a>
                                            </li>
                                        </ul>
                                        <div class="header-nav-right d-none d-lg-flex">
                                            @auth
                                                @if (auth()->user()->role === 'admin')
                                                    <div class="d-lg-none d-xl-block">
                                                        <a href="{{ route('admin.index') }}" class="btn ripple btn-min w-sm btn-primary me-2 my-auto">Dashboard</a>
                                                    </div>
                                                @else
                                                    <div class="d-lg-none d-xl-block">
                                                        <a href="{{ route('admin.postingan.index') }}" class="btn ripple btn-min w-sm btn-primary me-2 my-auto">Dashboard</a>
                                                    </div>
                                                @endif
                                            @endauth
                                            @guest
                                                <div class="d-lg-none d-xl-block">
                                                    <a href="{{ route('login') }}" class="btn ripple btn-min w-sm btn-primary me-2 my-auto">Login</a>
                                                </div>
                                            @endguest

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
            </div>

            @yield('container')
           
        </div>
    </div>

    <!-- FOOTER OPEN -->
    <div class="demo-footer">
        <div class="container">
            <div class="row">
                <div class="card">
                    <div class="card-body">
                        <div class="top-footer">
                            <div class="row">
                                <div class="col-lg-4 col-sm-12 col-md-12 reveal revealleft">
                                    <h6 class="text-justify">About cek</h6>
                                    <p class=""> Unit Kegiatan Mahasiswa Paduan Suara Mahasiswa Universitas Negeri
                                        Makassar Pinisi Choir (UKM PSM UNM Pinisi Choir)
                                        merupakan organisasi kemahasiswaan resmi tingkat Universitas Negeri Makassar
                                        yang telah berdiri sejak tahun 2011
                                        tepatnya pada tanggal 27 November, dan Resmi menjadi Unit Kegiatan Kemahasiswaan
                                        pada tanggal 29 April 2016
                                    </p>
                                </div>

                                <div class="col-lg-2 col-sm-6 col-md-4 reveal revealleft">
                                    <h6>Pages</h6>
                                    <ul class="list-unstyled mb-5 mb-lg-0">
                                        <li><a href="/">Home</a></li>
                                        <li><a href="">News</a></li>
                                        <li><a href="">Achievements</a></li>
                                        <li><a href="">About Us</a></li>
                                        <li><a href="">Testimonials</a></li>
                                    </ul>
                                </div>

                                <div class="col-lg-4 col-sm-12 col-md-4 reveal revealleft">
                                    <div class="">
                                        <a href=""><img loading="lazy" alt="" class="logo-2 mb-3"
                                                src="{{ asset('assets/images/brand/logo-3.png')}}"></a>
                                        <a href=""><img src="{{ asset('assets/images/brand/logo.png')}}" class="logo-3"
                                                alt="logo"></a>
                                        <p>Unit Kegiatan Mahasiswa Paduan Suara Mahasiswa Universitas Negeri Makassar
                                            Pinisi Choir (UKM PSM UNM Pinisi Choir).</p>
                                        <div class="form-group">
                                            <div class="input-group">
                                                <input type="text" class="form-control" placeholder="Enter your email"
                                                    aria-label="Example text with button addon"
                                                    aria-describedby="button-addon1">
                                                <button class="btn btn-primary" type="button"
                                                    id="button-addon2">Submit</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="btn-list mt-6">
                                        <button type="button" class="btn btn-icon rounded-pill"><i
                                                class="fa fa-facebook"></i></button>
                                        <button type="button" class="btn btn-icon rounded-pill"><i
                                                class="fa fa-youtube"></i></button>
                                        <button type="button" class="btn btn-icon rounded-pill"><i
                                                class="fa fa-twitter"></i></button>
                                        <button type="button" class="btn btn-icon rounded-pill"><i
                                                class="fa fa-instagram"></i></button>
                                    </div>
                                    <hr>
                                </div>
                            </div>
                        </div>

                        <footer class="main-footer px-0 pb-0 text-center">
                            <div class="row ">
                                <div class="col-md-12 col-sm-12">
                                    Copyright © <span id="year"></span> <a href="javascript:void(0)"></a> by UKM PSM UNM
                                    Pinisi Choir <a href="javascript:void(0)"> <span
                                            class="fa fa-heart text-danger"></span> </a> All rights reserved.
                                </div>
                            </div>
                        </footer>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- FOOTER CLOSED -->
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
    
    @include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])
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