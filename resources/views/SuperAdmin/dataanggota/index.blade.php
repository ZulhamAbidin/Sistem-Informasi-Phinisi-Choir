@extends('layouts.main')
@section('container')
    <div class="main-container container-fluid">

        <div class="page-header">
            <h1 class="page-title">List Data Anggota</h1>
            <div>
                <div class="breadcrumb">
                    <a href="{{ route('dataanggota.create') }}" class="btn btn-primary"><i
                            class="fa fa-plus-square me-2"></i>Tambah Data Anggota</a>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
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
                                <th>ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
    
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    
    </div>
            

    @if (session('success'))
        <div class="sweet-alert  visible" data-custom-class="" data-has-cancel-button="false" data-has-confirm-button="true"
            data-allow-outside-click="false" data-has-done-function="false" data-animation="pop" data-timer="null"
            style="display: block; margin-top: -176px;">
            <!-- Konten SweetAlert Anda -->
            <div class="sa-icon sa-error" style="display: none;">
                <span class="sa-x-mark">
                    <span class="sa-line sa-left"></span>
                    <span class="sa-line sa-right"></span>
                </span>
            </div>
            <div class="sa-icon sa-warning" style="display: none;">
                <span class="sa-body"></span>
                <span class="sa-dot"></span>
            </div>
            <div class="sa-icon sa-info" style="display: none;"></div>
            <div class="sa-icon sa-success" style="display: none;">
                <span class="sa-line sa-tip"></span>
                <span class="sa-line sa-long"></span>

                <div class="sa-placeholder"></div>
                <div class="sa-fix"></div>
            </div>
            <div class="sa-icon sa-custom"
                style="display: block; background-image: url(&quot;{{ asset('assets/images/brand/logo-2.png') }}&quot;); width: 80px; height: 80px;width:80px; height:80px">
            </div>
            <h3>Berhasil</h3>
            <p style="display: block;">{{ session('success') }}</p>
            <fieldset>
                <input type="text" tabindex="3" placeholder="">
                <div class="sa-input-error"></div>
            </fieldset>
            <div class="sa-error-container">
                <div class="icon">!</div>
                <p>Not valid!</p>
            </div>
            <div class="sa-button-container">
                <button class="cancel" tabindex="2" style="display: none; box-shadow: none;">Cancel</button>
                <div class="sa-confirm-button-container">
                    <button class="confirm" tabindex="1"
                        style="display: inline-block; background-color: rgb(140, 212, 245); box-shadow: rgba(140, 212, 245, 0.8) 0px 0px 2px, rgba(0, 0, 0, 0.05) 0px 0px 0px 1px inset;"
                        onclick="hideSweetAlert()">OK</button>
                    <div class="la-ball-fall">
                        <div></div>
                        <div></div>
                        <div></div>
                    </div>
                </div>
            </div>
        </div>

        <script>
            function hideSweetAlert() {
                const sweetAlert = document.querySelector('.sweet-alert');
                sweetAlert.classList.remove('visible');
                sweetAlert.classList.add('invisible');
            }
        </script>
    @endif

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    
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
                        "url": "/SuperAdmin/dataanggota/index",
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
                        },
                        {
                        "data": null,
                        "render": function (data, type, full, meta) {
                        return '<div class="d-flex flex-column" role="group">' +
                            '<a href="/SuperAdmin/dataanggota/' + full.id + '/edit" class="btn-sm btn btn-warning mb-2">Edit</a>' +
                            '<a href="/SuperAdmin/dataanggota/' + full.id + '" class="btn-sm btn btn-info mb-2">Detail</a>' +
                            '<button type="button" class="btn-sm btn btn-danger delete-post" data-id="' + full.id + '">Delete</button>' +
                            '</div>';
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
        function showCustomAlert(postinganId) {
            var modalId = "confirmDeleteModal" + postinganId;
            $("#" + modalId).modal("show");
        }

        function hideCustomAlert(postinganId) {
            var modalId = "confirmDeleteModal" + postinganId;
            $("#" + modalId).modal("hide");

        }
    </script>
@endsection


@push('scripts')
<script>
    $(document).on('click', '.delete-post', function(e) {
        e.preventDefault();
        const anggotaId = $(this).data('id');

        Swal.fire({
            title: 'Konfirmasi Hapus',
            text: 'Apakah Anda yakin ingin menghapus anggota ini?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Hapus!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                // Include CSRF token in headers
                const csrfToken = $('meta[name="csrf-token"]').attr('content');

                // Send AJAX delete request with CSRF token
                $.ajax({
                    url: '/SuperAdmin/dataanggota/' + anggotaId,
                    type: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': csrfToken
                    },
                    success: function(response) {
                        if (response.success) {
                            // Reload the DataTable or update the row accordingly
                            // For example, you can use DataTables API to reload the table
                            $('#anggotaTable').DataTable().ajax.reload();
                            // Show success message
                            Swal.fire('Berhasil', 'Anggota berhasil dihapus', 'success');
                        } else {
                            Swal.fire('Gagal', 'Gagal menghapus anggota', 'error');
                        }
                    },
                    error: function() {
                        Swal.fire('Error', 'Terjadi kesalahan', 'error');
                    }
                });
            }
        });
    });
</script>
@endpush
