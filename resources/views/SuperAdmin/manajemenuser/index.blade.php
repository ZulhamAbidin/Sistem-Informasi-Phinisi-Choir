@extends('layouts.main')
@section('container')
    <div class="main-container container-fluid">

        <!-- PAGE-HEADER -->
        <div class="page-header">
            <h1 class="page-title">  Data Anggota Unit Kegiatan Mahasiswa Paduan Suara Universitas Negeri Makassar
            </h1>
        </div>

        <!-- Konten lainnya di halaman ini -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title"></h3>
            </div>
            <div class="card-header">
                <button id="toggleRegistrationStatus" class="btn btn-info btn-block mt-4">Aktifkan Status Registrasi</button>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered border text-nowrap mb-0" id="basic-edit">
                        <thead class="text-center">
                            <tr>
                                <th>Nama Lengkap</th>
                                <th>NRA</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->nama_lengkap }}</td>
                                    <td>{{ $user->nra }}</td>
                                    <td>
                                        <button class="ubah-status btn btn-outline-primary"
                                            data-user-id="{{ $user->id }}">Konfirmasi Pendaftaran</button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var toggleRegistrationButton = document.getElementById('toggleRegistrationStatus');
    
            toggleRegistrationButton.addEventListener('click', function() {
                fetch('/admin/registration/update', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')
                            .getAttribute('content')
                    },
                    body: JSON.stringify({
                        _token: '{{ csrf_token() }}'
                    })
                })
                .then(response => response.json())
                .then(data => {
                    var statusMessage = data.new_status === '1' ? 'Pendaftaran saat ini terbuka.' : 'Pendaftaran saat ini tertutup.';
                    var buttonText = data.new_status === '1' ? 'Pendaftaran saat ini Terbuka, Apakah Anda Ingin Menutup Pendaftaran ?' : 'Pendaftaran saat ini Tertutup, Apakah Anda Ingin Membuka Pendaftaran ?';
                    toggleRegistrationButton.textContent = buttonText;
    
                    var buttonClass = data.new_status === '1' ? 'btn-primary' : 'btn-danger';
                    toggleRegistrationButton.classList.remove('btn-primary', 'btn-danger');
                    toggleRegistrationButton.classList.add(buttonClass);
    
                    Swal.fire({
                        icon: 'success',
                        title: 'Status Pendaftaran Berhasil Diubah!',
                        text: statusMessage,
                        showConfirmButton: false,
                        timer: 2000
                    });
                })
                .catch(error => {
                    Swal.fire({
                        icon: 'error',
                        title: 'Terjadi Kesalahan',
                        text: 'Terjadi kesalahan saat mengubah status Pendaftaran.'
                    });
                    console.error(error);
                });
            });
        });
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const buttons = document.querySelectorAll('.ubah-status');

            buttons.forEach(button => {
                button.addEventListener('click', function() {
                    const userId = this.getAttribute('data-user-id');
                    showConfirmation(userId);
                });
            });

            function showConfirmation(userId) {
                Swal.fire({
                    title: 'Konfirmasi',
                    text: 'Anda yakin ingin mengubah status pengguna ini?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Ya',
                    cancelButtonText: 'Tidak'
                }).then((result) => {
                    if (result.isConfirmed) {
                        updateStatus(userId);
                    }
                });
            }

            function updateStatus(userId) {
                // Kirim permintaan AJAX ke server
                fetch(`/admin/users/${userId}/update-status`, {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute(
                                'content'), // Ambil token CSRF dari tag meta
                            'Content-Type': 'application/json',
                        },
                        body: JSON.stringify({
                            status: 'terverifikasi'
                        }), // Sesuaikan dengan data yang perlu Anda kirim
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            Swal.fire({
                                title: 'Sukses!',
                                text: 'Status pengguna diperbarui.',
                                icon: 'success',
                            }).then(() => {
                                // Refresh halaman setelah 1 detik (1000 milidetik)
                                setTimeout(function() {
                                    location.reload();
                                }, 1000);
                            });
                        } else {
                            Swal.fire({
                                title: 'Gagal!',
                                text: 'Gagal memperbarui status pengguna.',
                                icon: 'error',
                            });
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                    });
            }
        });
    </script>
@endsection
