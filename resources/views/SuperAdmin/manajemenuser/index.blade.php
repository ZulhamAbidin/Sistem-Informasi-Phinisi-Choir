@extends('layouts.main')
@section('container')
    <div class="main-container container-fluid">

        <!-- PAGE-HEADER -->
        <div class="page-header">
            <h1 class="page-title">Pengajuan Data Anggota Unit Kegiatan Mahasiswa Paduan Suara Universitas Negeri Makassar</h1>
        </div>
        
        <div class="card">
            <div class="card-header">
                <h3 class="card-title"></h3>
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
                                        <button class="ubah-status btn btn-outline-primary" data-user-id="{{ $user->id }}">Konfirmasi Pendaftaran</button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>


    </div>

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
