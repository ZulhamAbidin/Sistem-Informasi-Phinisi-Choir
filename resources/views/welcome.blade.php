<!doctype html>
<html lang="en" dir="ltr">

<head>

    <!-- META DATA -->
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Zulham Abidin">
    <meta name="author" content="Zulham Abidin">
    <meta name="keywords" content="Zulham Abidin">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/images/brand/logo-2.png') }}" />
    <title>HOME</title>
    <link id="style" href="../assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
    <link href="../assets/css/style.css" rel="stylesheet" />
    <link href="../assets/css/dark-style.css" rel="stylesheet" />
    <link href="../assets/css/icons.css" rel="stylesheet" />
    <link id="theme" rel="stylesheet" type="text/css" media="all" href="../assets/colors/color1.css" />
 <style>
    .carousel-caption.d-md-block {
        text-align: center !important;
        background-color: rgba(0, 0, 0, 0.5) !important;
        position: relative !important;
        top: 50% !important;
        transform: translateY(-50%) !important;
        padding: 20px !important;
    }

    .my-title,
    .my-description {
        margin: 0 !important;
        line-height: 1.2 !important;
        font-weight: 700 !important;
        color: #fff !important;
        font-family: "Poppins" !important;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        text-align: center;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background-color: rgba(0, 0, 0, 0.5);
        padding: 10px;
    }

    .my-title {
        font-size: 40px !important;
    }

    .my-description {
        font-size: 10px !important;
        
        /* Atur ukuran teks yang lebih kecil */
    }

    @media (max-width: 767px) {

        .my-title,
        .my-description {
            font-size: 10px !important;
            /* Atur ukuran teks yang lebih kecil untuk perangkat mobile */
        }
    }
</style>
</head>

<body class="app ltr landing-page horizontal">


    <div id="global-loader">
        <img src="../assets/images/loader.svg" class="loader-img" alt="Loader">
    </div>

    <div class="page">
        <div class="page-main">

            <!-- app-Header -->
            <div class="hor-header header">
                <div class="container main-container">
                    <div class="d-flex">
                        <a aria-label="Hide Sidebar" class="app-sidebar__toggle" data-bs-toggle="sidebar"
                            href="javascript:void(0)"></a>
                        <!-- sidebar-toggle-->
                        <a class="logo-horizontal " href="index.html">
                            <img src="../assets/images/brand/logo.png" class="header-brand-img desktop-logo"
                                alt="logo">
                            <img src="../assets/images/brand/logo-3.png" class="header-brand-img light-logo1"
                                alt="logo">
                        </a>
                        <!-- LOGO -->
                        <div class="d-flex order-lg-2 ms-auto header-right-icons">
                            <button class="navbar-toggler navresponsive-toggler d-lg-none ms-auto" type="button"
                                data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent-4"
                                aria-controls="navbarSupportedContent-4" aria-expanded="false"
                                aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon fe fe-more-vertical"></span>
                            </button>
                            <div class="navbar navbar-collapse responsive-navbar p-0">
                                <div class="collapse navbar-collapse bg-white px-0" id="navbarSupportedContent-4">
                                    <!-- SEARCH -->
                                    <div class="header-nav-right p-5">
                                        <a href="register.html"
                                            class="btn ripple btn-min w-sm btn-outline-primary me-2 my-auto"
                                            target="_blank">New User
                                        </a>
                                        <a href="login.html" class="btn ripple btn-min w-sm btn-primary me-2 my-auto"
                                            target="_blank">Login
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /app-Header -->

            <div class="landing-top-header overflow-hidden">
                <div class="top sticky overflow-hidden">
                    <!--APP-SIDEBAR-->
                    <div class="app-sidebar__overlay" data-bs-toggle="sidebar"></div>
                    <div class="app-sidebar bg-transparent horizontal-main">
                        <div class="container">
                            <div class="row">
                                <div class="main-sidemenu navbar px-0">
                                    <a class="navbar-brand ps-0 d-none d-lg-block" href="index.html">
                                        <img alt="" class="logo-2" src="../assets/images/brand/logo-3.png">
                                        <img src="../assets/images/brand/logo.png" class="logo-3" alt="logo">
                                    </a>
                                    <ul class="side-menu">
                                        <li class="slide">
                                            <a class="side-menu__item active" data-bs-toggle="slide"
                                                href="#home"><span class="side-menu__label">Home</span></a>
                                        </li>
                                        <li class="slide">
                                            <a class="side-menu__item" data-bs-toggle="slide" href="#Features"><span
                                                    class="side-menu__label">Features</span></a>
                                        </li>
                                        <li class="slide">
                                            <a class="side-menu__item" data-bs-toggle="slide" href="#About"><span
                                                    class="side-menu__label">About</span></a>
                                        </li>
                                    </ul>
                                    <div class="header-nav-right d-none d-lg-flex">
                                        <a href="{{ route('login') }}"
                                            class="btn ripple btn-min w-sm btn-outline-primary me-2 my-auto d-lg-none d-xl-block d-block"
                                            target="_blank">New User
                                        </a>
                                        <a href="login.html"
                                            class="btn ripple btn-min w-sm btn-primary me-2 my-auto d-lg-none d-xl-block d-block"
                                            target="_blank">Login
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/APP-SIDEBAR-->
                </div>
            </div>

            <!--app-content open-->
            <div class="main-content mt-0">
                <div class="side-app">

                    <!-- CONTAINER -->
                    <div class="main-container">
                        {{-- CAROUSEL --}}
                        <div id="carousel-captions" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                @foreach ($carousels as $carousel)
                                    <div class="carousel-item{{ $loop->first ? ' active' : '' }}">
                                        <img class="d-block h-50 br-5" alt="" 
                                            src="{{ asset('storage/uploads/' . $carousel->image_path) }}"
                                            data-bs-holder-rendered="true">
                                    <div class="carousel-item-background"></div>
                                       <div class="">
                                        <h1 class="my-title items-center justify-content-center">{{ $carousel->title }} <br> {{ $carousel->description }}</h1>
                                        {{-- <p class="my-description">{{ $carousel->description }}</p> --}}
                                    </div>
                                    </div>
                                @endforeach
                            </div>

                            <a class="carousel-control-prev" href="#carousel-captions" role="button"
                                data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>

                            <a class="carousel-control-next" href="#carousel-captions" role="button"
                                data-bs-slide="next">
                                <span class="carousel-control-next-icon" ariahidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                        {{-- CAROUSEL END --}}
                    </div>
                </div>
            </div>
        </div>
        <!--app-content closed-->

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
                                                <div class="col-12 col-md-6 col-lg-4">
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
                                                                        <a class="new option-dots"
                                                                            href="JavaScript:void(0);"
                                                                            data-bs-toggle="dropdown">
                                                                            <span class=""><i
                                                                                    class="fe fe-more-vertical"></i></span>
                                                                        </a>
                                                                        <div class="dropdown-menu dropdown-menu-end">
                                                                            <a class="dropdown-item"
                                                                                href="{{-- {{ route('admin.postingan.show', $postingan->id) }} --}}"> Lihat
                                                                                Postingan</a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="mt-4">
                                                                <div class="d-flex">
                                                                    <a href="{{-- {{ route('admin.postingan.show', $postingan->id) }} --}}"
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
                                                                            href="JavaScript:void(0);"><span
                                                                                class=""><i
                                                                                    class="fe fe-heart"></i></span></a>
                                                                        <a class="new me-2 text-muted fs-16"
                                                                            href="JavaScript:void(0);"><span
                                                                                class=""><i
                                                                                    class="fe fe-message-square"></i></span></a>
                                                                        <a class="new text-muted fs-16"
                                                                            href="JavaScript:void(0);"><span
                                                                                class=""><i
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
        </div>
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
                                    <h6>About</h6>
                                    <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium
                                        doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore
                                        veritatis et quasi architecto beatae vitae dicta sunt
                                        explicabo.
                                    </p>
                                    <p class="mb-5 mb-lg-2">Duis aute irure dolor in reprehenderit in voluptate
                                        velit esse cillum dolore eu fugiat nulla pariatur Excepteur sint occaecat .
                                    </p>
                                </div>
                                <div class="col-lg-2 col-sm-6 col-md-4 reveal revealleft">
                                    <h6>Pages</h6>
                                    <ul class="list-unstyled mb-5 mb-lg-0">
                                        <li><a href="index.html">Dashboard</a></li>
                                        <li><a href="alerts.html">Elements</a></li>
                                        <li><a href="form-elements.html">Forms</a></li>
                                        <li><a href="charts.html">Charts</a></li>
                                        <li><a href="datatable.html">Tables</a></li>
                                        <li><a href="file-attachments.html">Other Pages</a></li>
                                    </ul>
                                </div>
                                <div class="col-lg-2 col-sm-6 col-md-4 reveal revealleft">
                                    <h6>Information</h6>
                                    <ul class="list-unstyled mb-5 mb-lg-0">
                                        <li><a href="about.html">Our Team</a></li>
                                        <li><a href="about.html">Contact US</a></li>
                                        <li><a href="about.html">About</a></li>
                                        <li><a href="services.html">Services</a></li>
                                        <li><a href="blog.html">Blog</a></li>
                                        <li><a href="terms.html">Terms and Services</a></li>
                                    </ul>
                                </div>
                                <div class="col-lg-4 col-sm-12 col-md-4 reveal revealleft">
                                    <div class="">
                                        <a href="index.html"><img loading="lazy" alt="" class="logo-2 mb-3"
                                                src="../assets/images/brand/logo-3.png"></a>
                                        <a href="index.html"><img src="../assets/images/brand/logo.png"
                                                class="logo-3" alt="logo"></a>
                                        <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum
                                            dolore eu fugiat nulla pariatur Excepteur sint occaecat.</p>
                                        <div class="form-group">
                                            <div class="input-group">
                                                <input type="text" class="form-control"
                                                    placeholder="Enter your email"
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
                                    Copyright © <span id="year"></span> <a href="javascript:void(0)">Sash</a>.
                                    Designed with <span class="fa fa-heart text-danger"></span> by <a
                                        href="javascript:void(0)"> Spruko </a> All rights reserved.
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

    <!-- BACK-TO-TOP -->
    <a href="#top" id="back-to-top"><i class="fa fa-angle-up"></i></a>

    <!-- JQUERY JS -->
    <script src="../assets/js/jquery.min.js"></script>

    <!-- BOOTSTRAP JS -->
    <script src="../assets/plugins/bootstrap/js/popper.min.js"></script>
    <script src="../assets/plugins/bootstrap/js/bootstrap.min.js"></script>

    <!-- COUNTERS JS-->
    <script src="../assets/plugins/counters/counterup.min.js"></script>
    <script src="../assets/plugins/counters/waypoints.min.js"></script>
    <script src="../assets/plugins/counters/counters-1.js"></script>

    <!-- Perfect SCROLLBAR JS-->
    <script src="../assets/plugins/owl-carousel/owl.carousel.js"></script>
    <script src="../assets/plugins/company-slider/slider.js"></script>

    <!-- Star Rating Js-->
    <script src="../assets/plugins/rating/jquery-rate-picker.js"></script>
    <script src="../assets/plugins/rating/rating-picker.js"></script>

    <!-- Star Rating-1 Js-->
    <script src="../assets/plugins/ratings-2/jquery.star-rating.js"></script>
    <script src="../assets/plugins/ratings-2/star-rating.js"></script>

    <!-- Sticky js -->
    <script src="../assets/js/sticky.js"></script>

    <!-- CUSTOM JS -->
    <script src="../assets/js/landing.js"></script>

</body>

</html>
