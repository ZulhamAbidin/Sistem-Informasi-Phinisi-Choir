<!doctype html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="PSM UNM">
    <meta name="Zulham Abidin" content="PSM">
    <meta name="keywords" content="PADUAN SUARA UNM.">
    <title>DATA ANGGOTA.</title>
    <link rel="icon" href="{{ asset('assets/images/brand/logo-2.png')}}">

    <link id="style" href="{{ asset('assets/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/dark-style.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/transparent-style.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/skin-modes.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/icons.css') }}" rel="stylesheet " />
    <link id="theme" rel="stylesheet" type="text/css" media="all" href="{{ asset('assets/colors/color1.css') }}" />

    <link href="{{ asset('assets/js/alert/sweetalert2.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/js/alert/sweetalert2.min.css') }}" rel="stylesheet" />
    {{-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">  --}}

</head>

<body class="app ltr landing-page horizontal">
<div id="global-loader">
    <img src="{{ asset('assets/images/loader.svg') }}" class="loader-img" alt="Loader">
</div>

<div class="page">
    <div class="page-main">

        <div class="hor-header header">
            <div class="container main-container">
                <div class="d-flex">

                    <a class="logo-horizontal " href="">
                        <img src="{{ asset('assets/images/brand/logo.png') }}" class="header-brand-img desktop-logo"
                            alt="logo">
                        <img src="{{ asset('assets/images/brand/logo-3.png') }}" class="header-brand-img light-logo1"
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
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                        @csrf
                                        <button class="btn ripple btn-min w-sm btn-primary me-2 my-auto"
                                            onclick="confirmLogout(event)">Log Out</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="landing-top-header overflow-hidden">
            <div class="top sticky overflow-hidden">
                <!--APP-SIDEBAR-->
                <div class="app-sidebar__overlay" data-bs-toggle="sidebar"></div>
                <div class="app-sidebar bg-transparent horizontal-main">
                    <div class="container">
                        <div class="row">
                            <div class="main-sidemenu navbar px-0">
                                <a class="navbar-brand ps-0 d-none d-lg-block" href="/">
                                    <img alt="" class="logo-2" src="{{ asset('assets/images/brand/logo-3.png') }}">
                                    <img src="{{ asset('assets/images/brand/logo.png') }}" class="logo-3" alt="logo">
                                </a>

                                <div class="header-nav-right d-none d-lg-flex">
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                        @csrf
                                        <button class="btn ripple btn-min w-sm btn-primary me-2 my-auto"
                                            onclick="confirmLogout(event)">Log Out</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--/APP-SIDEBAR-->
            </div>

        </div>

        <div class="main-content mt-0">
            <div class="side-app">
                <div class="main-container">
                    
                    <div class="container">
                        <div class="modal fade" id="photoModal" tabindex="-1" aria-labelledby="photoModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="photoModalLabel">Lihat Foto</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <img src="" alt="Foto" class="img-fluid" id="modalPhoto">
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="anggotaTable" class="data-table table" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>NRA</th>
                                                <th>NAMA LENGKAP</th>
                                                <th>JABATAN</th>
                                                <th>GENERI</th>
                                                <th>MOTTO</th>
                                                <th>ALAMAT</th>
                                                <th>DESKRIPSI</th>
                                                <th>FOTO</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                        
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>

    <div class="pb-4">
        <div class="container">
            <footer class="main-footer px-0 pb-0 text-center">
                <div class="row ">
                    <div class="col-md-12 col-sm-12">
                        Copyright © <span id="year"></span> <a href="javascript:void(0)">Arfah Awaluddin T</a>.
                        Designed with by <a href="javascript:void(0)"> Arfah Awaluddin T </a> All
                        rights reserved.
                    </div>
                </div>
            </footer>
        </div>
    </div>
</div>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

    <!-- Skrip DataTables -->
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>

    <!-- Skrip Swal (SweetAlert2) -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <!-- Inisialisasi DataTables -->
    <script>
        $(document).ready(function () {
            var table = $('#anggotaTable').DataTable({
                "processing": true,
                "serverSide": true,
                "ajax": {
                    "url": "/admin/AnggotaList",
                    "type": "GET"
                },
                "columns": [
                    {"data": "nra"},
                    {"data": "nama_lengkap"},
                    {"data": "jabatan"},
                    {"data": "generasi"},
                    {"data": "deskripsi"},
                    {"data": "alamat"},
                    {"data": "motto"},
                    {
                        "data": "foto",
                        "render": function (data, type, full, meta) {
                            if (type === 'display' && data) {
                                // Check screen width
                                if ($(window).width() > 768) {
                                    return '<button type="button" class="btn btn-sm btn-light view-photo-btn" data-toggle="modal" data-target="#photoModal"><i class="fa fa-camera"></i></button>';
                                } else {
                                    return '<img src="' + data + '" alt="Foto" class="" alt="Foto">';
                                }
                            } else {
                                return ''; 
                            }
                        }
                    }
                ],
                "pagingType": "full_numbers",
                "lengthMenu": [5, 10, 25, 50],
                "pageLength": 10,
                "searching": true,
                "responsive": true
            });
    
            $('#anggotaTable tbody').on('click', '.view-photo-btn', function () {
                var data = table.row($(this).closest('tr')).data();
                
                if (data && data.foto) {
                    $('#modalPhoto').attr('src', data.foto);
                    $('#photoModal').modal('show');
                }
            });
    
            // Handle window resize
            $(window).resize(function () {
                // Redraw DataTable on window resize
                table.columns.adjust().responsive.recalc();
            });
        });
    </script>


    <script>
        function confirmLogout(event) {
        event.preventDefault();
        Swal.fire({
            title: 'Alert',
            text: 'Anda yakin ingin logout?',
            icon: 'error',
            showCancelButton: true,
            confirmButtonText: 'Exit',
            cancelButtonText: 'Stay on the page',
            customClass: {
                popup: 'swal2-small',
                title: 'swal2-title-small',
                content: 'swal2-content-small'
            }
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('logout-form').submit();
            }
        });
    }
    </script>

    <a href="#top" id="back-to-top"><i class="fa fa-angle-up"></i></a>
    <script src="{{ asset('assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatable/js/dataTables.bootstrap5.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatable/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatable/js/buttons.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatable/js/jszip.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatable/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatable/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatable/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatable/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatable/js/buttons.colVis.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatable/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatable/responsive.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('assets/js/table-data.js') }}"></script>


    <script src="{{ asset('asset/plugins/select2/select2.full.min.js') }}"></script>
    <script src="{{ asset('asset/js/select2.js') }}"></script>
    <script src="{{ asset('assets/plugins/input-mask/jquery.mask.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/bootstrap/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/counters/counterup.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/counters/waypoints.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/counters/counters-1.js') }}"></script>
    <script src="{{ asset('assets/plugins/owl-carousel/owl.carousel.js') }}"></script>
    <script src="{{ asset('assets/plugins/company-slider/slider.js') }}"></script>
    <script src="{{ asset('assets/plugins/sidebar/sidebar.js') }}"></script>
    <script src="{{ asset('assets/js/themeColors.js') }}"></script>
    <script src="{{ asset('assets/js/sticky.js') }}"></script>
    <script src="{{ asset('assets/js/landing.js') }}"></script>
</body>
</html>