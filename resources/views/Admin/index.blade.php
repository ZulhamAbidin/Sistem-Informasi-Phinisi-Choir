<!doctype html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Sash – Bootstrap 5  Admin & Dashboard Template">
    <meta name="Zulham Abidin" content="Phinisi Choir">
    <meta name="keywords"
        content="admin,admin dashboard,admin panel,admin template,bootstrap,clean,dashboard,flat,jquery,modern,responsive,premium admin templates,responsive admin,ui,ui kit.">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/images/brand/favicon.ico') }}" />
    <title>DATA PENGURUS</title>
    <link id="style" href="{{ asset('assets/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/dark-style.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/icons.css') }}" rel="stylesheet" />
    <link id="theme" rel="stylesheet" type="text/css" media="all"
        href="{{ asset('assets/colors/color1.css') }}" />

    <!-- Referensi ke file CSS SweetAlert -->
    <link href="{{ asset('assets/js/alert/sweetalert2.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/js/alert/sweetalert2.min.css') }}" rel="stylesheet" />
    
</head>

<body class="app ltr landing-page horizontal">

    <div id="global-loader">
        <img src="../assets/images/loader.svg" class="loader-img" alt="Loader">
    </div>

    <div class="page">
        <div class="page-main">

            <div class="hor-header header">
                <div class="container main-container">
                    <div class="d-flex">
                        <a aria-label="Hide Sidebar" class="app-sidebar__toggle" data-bs-toggle="sidebar"
                            href="javascript:void(0)"></a>

                        <a class="logo-horizontal " href="">
                            <img src="{{ asset('assets/images/brand/logo.png') }}" class="header-brand-img desktop-logo"
                                alt="logo">
                            <img src="{{ asset('assets/images/brand/logo-3.png') }}"
                                class="header-brand-img light-logo1" alt="logo">
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
                                        <img alt="" class="logo-2"
                                            src="{{ asset('assets/images/brand/logo-3.png') }}">
                                        <img src="{{ asset('assets/images/brand/logo.png') }}" class="logo-3"
                                            alt="logo">
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

            <!--app-content open-->
            <div class="main-content mt-0">
                <div class="side-app">

                    <div class="main-container">
                        <div class="">

                           


                            <!-- ROW-1 OPEN -->
                            <div class="section pb-0">

                                <div class="container">
                                    <div class="col-xl-9">
                                        <div class="card">
                                            <div class="card-header">
                                                <h3 class="card-title mx-auto text-justify">Data Anggota Unit Kegiatan Mahasiswa Paduan Suara Mahasiswa Universitas Negeri Makassar Pinisi Choir</h3>
                                            </div>
                                            @if ($anggota)
                                            <div class="card-body">
                                                <div class="email-media">
                                                    <div class="mt-0 d-sm-flex">
                                                        @if ($anggota->foto)
                                                             <img class="me-2 rounded-circle avatar avatar-lg" src="{{ asset('storage/uploads/' . $anggota->foto) }}" alt="avatar">
                                                        @endif
                                                        <div class="media-body pt-0">
                                                            <div class="float-end d-none d-md-flex fs-15">
                                                                <small class="me-3 mt-3 text-muted"></small>
                                                                
                                                                <a href="javascript:void(0)" class="me-3 email-icon text-secondary bg-secondary-transparent"
                                                                    data-bs-toggle="tooltip" title="" data-bs-original-title="Reply" aria-label="Reply"><i
                                                                        class="fa fa-reply"></i></a>
                                                                <div class="me-3">
                                                                    <a href="javascript:void(0)" class="text-danger email-icon bg-danger-transparent"
                                                                        data-bs-toggle="dropdown" role="button" aria-haspopup="true"
                                                                        aria-expanded="false"><i class="fe fe-more-horizontal"></i></a>
                                                                    <div class="dropdown-menu dropdown-menu-end">

                                                                        <a class="dropdown-item" href="#createModal" data-bs-effect="effect-scale" data-bs-toggle="modal"><i class="fe fe-share me-2"></i>
                                                                            Reupload Data Diri</a>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="media-title text-dark font-weight-semibold mt-1">{{ $anggota->nama_lengkap }} <span
                                                                    class="text-muted font-weight-semibold"></span></div>
                                                            <small class="mb-0">Jabatan {{ $anggota->jabatan }} Generasi ke {{ $anggota->generasi }}</small><br>
                                                            <small class="mb-0 text-lowercase">Alamat Saya {{ $anggota->alamat }}, {{ $anggota->notelfon }}</small><br>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="eamil-body mt-5">
                                                    <h6>Saya {{ $anggota->nama_lengkap }}</h6><br>
                                                    <p class="text-lowercase text-justify">{{ $anggota->deskripsi }}</p>
                                                    <br>
                                                    <small class="mb-0 font-italic">{{ $anggota->motto }}</small>
                                                    <hr>
                                                   
                                                </div>
                                            </div>
                                            @else
                                            <div class="d-block text-center">
                                                <br>
                                                <p>Anda belum mengunggah data diri anda. Data diri anda akan tampil di halaman utama list data pengurus.</p>
                                                <a class="dropdown-item" href="#createModal" data-bs-effect="effect-scale" data-bs-toggle="modal">
                                                    <i class="fe fe-share me-2"></i> Lengkapi Data Diri Sekarang
                                                </a>
                                            </div>
                                            @endif
                                            
                                        </div>
                                    </div>
                                </div>

                                <div class="container">
                                    <div class="row">
                                       
                                        <div class="modal fade" id="createModal">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Kelola Data Anda</h5>
                                                        <button aria-label="Close" class="btn-close"
                                                            data-bs-dismiss="modal"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form id="createForm" action="{{ route('admin.store') }}"
                                                            method="POST" enctype="multipart/form-data">
                                                            @csrf
                                                            <input type="hidden" id="editAnggotaId"
                                                                name="editAnggotaId" value="">
                                                            <div class="form-group">
                                                                <label for="nama_lengkap">Nama Lengkap</label>
                                                                <input type="text" class="form-control"
                                                                    name="nama_lengkap" placeholder="Contoh : Arfah Awaluddin T" required>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="jabatan">Jabatan</label>
                                                                <input type="text" class="form-control"
                                                                    name="jabatan" placeholder="Contoh : Sekretaris Umum" required>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="generasi">Generasi</label>
                                                                <input type="text" class="form-control"
                                                                    name="generasi" placeholder="Contoh : 9" required>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="alamat">Alamat</label>
                                                                <input type="text" class="form-control"
                                                                    name="alamat" placeholder="Contoh : Kecamatan Pallangga, Kabupaten Gowa" required>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="notelfon">No. Telepon</label>
                                                                <input type="text" class="form-control"
                                                                    name="notelfon" placeholder="Contoh : +62895801138822" required>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="motto">Motto</label>
                                                                <input type="text" class="form-control"
                                                                    name="motto" placeholder="Contoh : Jika Proses Adalah Luka Maka Bertahan Adalah Cinta">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="deskripsi">Deskripsi</label>
                                                                <textarea class="form-control" name="deskripsi" rows="4" placeholder="Contoh : Lorem ipsum dolor sit amet consectetur adipisicing elit. Omnis voluptas, provident aut quidem recusandae atque esse accusamus reiciendis assumenda ea, fugit laudantium commodi, id ratione. Dolore eos laboriosam molestias temporibus alias dolores ea maiores incidunt deleniti odio vero voluptate, exercitationem repellat accusantium quod, perferendis impedit, minima ipsa obcaecati necessitatibus? Sunt minus eos, deserunt architecto ipsam nihil consequuntur asperiores ipsum facere eaque voluptas voluptate similique eum nostrum soluta doloremque, laboriosam commodi velit. Praesentium tenetur nesciunt architecto sed, fugiat possimus perferendis impedit, quaerat facilis voluptate officiis fuga! Voluptatibus harum commodi laborum numquam beatae repellat inventore! Vero doloremque facere modi. Corporis, unde consectetur." ></textarea>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="foto">Foto</label>
                                                                <input type="file" name="foto" class="form-control"  accept="image/*">
                                                                <small class="text-danger">Pasikan anda mengunggah foto dengan ukuran persegi</small>
                                                            </div>
                                                        </form>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button class="btn btn-primary"
                                                            onclick="submitForm()">Simpan</button>
                                                        <button class="btn btn-light"
                                                            data-bs-dismiss="modal">Tutup</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                    <!-- CONTAINER CLOSED-->
                </div>
            </div>
            <!--app-content closed-->
        </div>

        <!-- FOOTER OPEN -->
        <div class="pb-4">
            <div class="container">
                <footer class="main-footer px-0 pb-0 text-center">
                    <div class="row ">
                        <div class="col-md-12 col-sm-12">
                            Copyright © <span id="year"></span> <a href="javascript:void(0)">Arfah Awaluddin T</a>.
                            Designed with by <a
                                href="javascript:void(0)"> Arfah Awaluddin T </a> All
                            rights reserved.
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <!-- FOOTER CLOSED -->
    </div>

    <script src="{{ asset('assets/js/alert/sweetalert2.all.js') }}"></script>
    <script src="{{ asset('assets/js/alert/sweetalert2.all.min.js') }}"></script>
    <script src="{{ asset('assets/js/alert/sweetalert2.js') }}"></script>
    <script src="{{ asset('assets/js/alert/sweetalert2.min.js') }}"></script>
    

    <script>
        function confirmLogout(event) {
        // Menghentikan pemrosesan formulir bawaan
        event.preventDefault();
    
        // Menampilkan pesan konfirmasi SweetAlert
        Swal.fire({
            title: 'Alert',
            text: 'Anda yakin ingin logout?',
            icon: 'error',
            showCancelButton: true,
            confirmButtonText: 'Exit',
            cancelButtonText: 'Stay on the page',
            customClass: {
                // Menambahkan kelas "small" untuk membuat alert lebih kecil
                popup: 'swal2-small',
                title: 'swal2-title-small',
                content: 'swal2-content-small'
            }
        }).then((result) => {
            if (result.isConfirmed) {
                // Jika pengguna memilih "Exit," maka kirimkan formulir logout
                document.getElementById('logout-form').submit();
            }
        });
    }
    </script>

    <a href="#top" id="back-to-top"><i class="fa fa-angle-up"></i></a>
    <script type="text/javascript">
        $(document).ready(function() {
            $.ajax({
                url: '{{ route('get.user.data') }}',
                type: 'GET',
                dataType: 'json',
                success: function(response) {
                    var anggotaData = response.anggota;

                    // Tampilkan data dalam elemen dengan ID sesuai dengan field
                    $('#nama_lengkap').text(anggotaData.nama_lengkap);
                    $('#jabatan').text(anggotaData.jabatan);
                    $('#generasi').text(anggotaData.generasi);
                    $('#alamat').text(anggotaData.alamat);
                    $('#notelfon').text(anggotaData.notelfon);
                    $('#motto').text(anggotaData.motto);
                    $('#deskripsi').text(anggotaData.deskripsi);
                    $('#foto').attr('src', anggotaData.foto);
                },
                error: function(xhr) {
                    // Handle kesalahan jika terjadi
                    console.log('Error:', xhr);
                }
            });
        });
    </script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


    <script type="text/javascript">
        function openEditModal(anggotaId) {
            // Di sini Anda dapat mengisi formulir dengan data anggota menggunakan AJAX
            $.ajax({
                url: "/admin/" + anggotaId + "/edit", // Ganti URL sesuai dengan rute yang sesuai di Laravel
                type: "GET",
                dataType: "json",
                success: function(data) {
                    // Isi formulir dengan data anggota yang diterima dari server
                    $("#editForm input[name='nama_lengkap']").val(data.nama_lengkap);
                    $("#editForm input[name='jabatan']").val(data.jabatan);
                    // Sisipkan field lainnya disini

                    // Tampilkan modal
                    $('#editModal').modal('show');
                }
            });
        }

        function submitEditForm() {
            // Mengambil data dari formulir
            var formData = new FormData($("#editForm")[0]);

            // Mengirim data ke server untuk pembaruan
            $.ajax({
                url: "/admin/" + anggotaId, // Ganti URL sesuai dengan rute update di Laravel
                type: "POST", // Anda dapat menggunakan metode PUT juga jika sudah disesuaikan di Laravel
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    // Handle respons dari server, misalnya, menampilkan pesan sukses atau error
                    // Setelah berhasil disimpan, Anda dapat menutup modal
                    $('#editModal').modal('hide');
                }
            });
        }
    </script>

    

    <script>
        function submitForm() {
            var formData = new FormData($('#createForm')[0]);

            $.ajax({
                url: $('#createForm').attr('action'),
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    if (response.success) {
                        // Tutup modal setelah anggota berhasil dibuat
                        $('#createModal').modal('hide');
                        // Lakukan perbaruan halaman atau tindakan lain yang sesuai
                        location.reload();
                    } else {
                        alert('Terjadi kesalahan. Silakan coba lagi nanti.');
                    }
                },
                error: function(error) {
                    console.log(error);
                    alert('Terjadi kesalahan. Silakan coba lagi nanti.');
                }
            });
        }
    </script>

    <!-- Select2 js-->
    <script src="{{ asset('asset/plugins/select2/select2.full.min.js') }}"></script>
    <script src="{{ asset('asset/js/select2.js') }}"></script>

    <!-- JQUERY JS -->
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>

    <!-- BOOTSTRAP JS -->
    <script src="{{ asset('assets/plugins/bootstrap/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>

    <!-- COUNTERS JS-->
    <script src="{{ asset('assets/plugins/counters/counterup.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/counters/waypoints.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/counters/counters-1.js') }}"></script>

    <!-- Perfect SCROLLBAR JS-->
    <script src="{{ asset('assets/plugins/owl-carousel/owl.carousel.js') }}"></script>
    <script src="{{ asset('assets/plugins/company-slider/slider.js') }}"></script>

    <!-- Star Rating Js-->
    <script src="{{ asset('assets/plugins/rating/jquery-rate-picker.js') }}"></script>
    <script src="{{ asset('assets/plugins/rating/rating-picker.js') }}"></script>

    <!-- Star Rating-1 Js-->
    <script src="{{ asset('assets/plugins/ratings-2/jquery.star-rating.js') }}"></script>
    <script src="{{ asset('assets/plugins/ratings-2/star-rating.js') }}"></script>

    <!-- Sticky js -->
    <script src="{{ asset('assets/js/sticky.js') }}"></script>

    <!-- CUSTOM JS -->
    <script src="{{ asset('assets/js/landing.js') }}"></script>


</body>

</html>
