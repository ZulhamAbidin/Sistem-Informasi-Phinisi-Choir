@extends('layouts.main')
@section('container')
    <div class="main-container container-fluid">

        <div class="page-header">
            <h1 class="page-title">List Data Anggota</h1>
            <div>
                <div class="breadcrumb">
                    <a href="{{ route('dataanggota.create') }}" class="btn btn-primary"><i class="fa fa-plus-square me-2"></i>Tambah Data Anggota</a>
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

    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
@endsection

@if (session('success'))
    @push('scripts')
    <script>
        Swal.fire({
                    title: 'Berhasil',
                    text: '{{ session('success') }}',
                    confirmButtonColor: '#303031',
                    imageUrl: '{{ asset('assets/images/brand/logo-2.png') }}',
                    imageWidth: 80, 
                    imageHeight: 80, 
                });
    </script>
    @endpush
@endif

@push('scripts')
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
            
                    $(window).resize(function () {
                        table.columns.adjust().responsive.recalc();
                    });
        });
    </script>

    <script>
        $(document).on('click', '.delete-post', function(e) {
            e.preventDefault();
            const anggotaId = $(this).data('id');
            Swal.fire({
                title: 'Konfirmasi Hapus',
                text: 'Apakah Anda yakin ingin menghapus?',
                showCancelButton: true,
                confirmButtonColor: '#303031',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Hapus!',
                cancelButtonText: 'Batal',
                imageUrl: '{{ asset('assets/images/brand/logo-2.png') }}', 
                imageWidth: 80, 
                imageHeight: 80, 
                imageAlt: 'Custom image',
            }).then((result) => {
                if (result.isConfirmed) {
                    const csrfToken = $('meta[name="csrf-token"]').attr('content');
                    $.ajax({
                        url: '/SuperAdmin/dataanggota/' + anggotaId,
                        type: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': csrfToken
                        },
                        success: function(response) {
                            if (response.success) {
                                $('#anggotaTable').DataTable().ajax.reload();
                                Swal.fire({
                                    title: 'Berhasil',
                                    text: 'Anggota berhasil dihapus',
                                    imageUrl: '{{ asset('assets/images/brand/logo-2.png') }}',
                                    imageWidth: 80,
                                    imageHeight: 80,
                                    confirmButtonColor: '#303031',
                                });
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
