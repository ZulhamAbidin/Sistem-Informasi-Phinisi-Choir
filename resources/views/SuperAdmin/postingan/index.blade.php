@extends('layouts.main')
@section('container')
    <div class="main-container container-fluid">

        <div class="page-header">
            <h1 class="page-title">Postingan</h1>
            <div>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Postingan</a></li>
                    <li class="breadcrumb-item active" aria-current="page">List Postingan</li>
                </ol>
            </div>
        </div>

        <div class="row ">
            <div class="col-md-12">
                @foreach ($postingans as $postingan)
                    <div class="modal text-center" id="confirmDeleteModal{{ $postingan->id }}" tabindex="-1" role="dialog"
                        aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <span class=""><svg xmlns="http://www.w3.org/2000/svg" height="60"
                                            width="60" viewBox="0 0 24 24">
                                            <path fill="#f07f8f"
                                                d="M20.05713,22H3.94287A3.02288,3.02288,0,0,1,1.3252,17.46631L9.38232,3.51123a3.02272,3.02272,0,0,1,5.23536,0L22.6748,17.46631A3.02288,3.02288,0,0,1,20.05713,22Z">
                                            </path>
                                            <circle cx="12" cy="17" r="1" fill="#e62a45"></circle>
                                            <path fill="#e62a45"
                                                d="M12,14a1,1,0,0,1-1-1V9a1,1,0,0,1,2,0v4A1,1,0,0,1,12,14Z"></path>
                                        </svg></span>
                                    <h4 class="h4 mb-3 mt-3">Peringatan</h4>
                                    <p class="card-text">Apakah kamu yakin ingin menghapus data ini?</p>
                                </div>
                                <div class="modal-footer">
                                    <a href="javascript:void(0)" class="btn btn-white"
                                        onclick="hideCustomAlert({{ $postingan->id }})">Cancel</a>
                                    <form action="{{ route('admin.postingan.destroy', ['id' => $postingan->id]) }}"
                                        method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        @if (count($postingans) > 0)
                        <div class="row">
                            @foreach ($postingans as $postingan)
                            <div class="col-12 col-md-6 col-lg-4">
                            <div class="card border p-0 shadow-none">
                                <div class="card-body">
                                    <div class="d-flex">
                                        <div class="media mt-0">
                                            <div class="media-user me-2">
                                                <div class=""><img alt="" class="rounded-circle avatar avatar-md"
                                                        src="{{ asset('assets/images/brand/logo-2.png') }}"></div>
                                            </div>
                                            <div class="media-body">
                                                <h6 class="mb-0 mt-1">{{auth()->user()->nama_lengkap }}</h6>
                                                <small class="text-muted">{{ $postingan->selisihWaktu }}</small>
                                            </div>
                                        </div>
                                        <div class="ms-auto">
                                            <div class="dropdown show">
                                                <a class="new option-dots" href="JavaScript:void(0);" data-bs-toggle="dropdown">
                                                    <span class=""><i class="fe fe-more-vertical"></i></span>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <a class="dropdown-item" href="{{ route('admin.postingan.edit', ['id' => $postingan->id]) }}">Edit Postingan</a>
                                                    <button class="dropdown-item" onclick="showCustomAlert({{ $postingan->id }})">Hapus Postingan</button>
                                                    <a class="dropdown-item" href="{{ route('admin.postingan.show', $postingan->id) }}"> Lihat Postingan</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-4">
                                        <div class="d-flex">
                                            <a href="{{ route('admin.postingan.show', $postingan->id) }}" class="w-100"><img src="{{ asset('storage/uploads/' . $postingan->sampul) }}" alt="img"
                                                    class="br-5"></a>
                                        </div>
                                        <h4 class="fw-semibold mt-3">{{ Str::limit($postingan->judul_postingan, 30) }}</h4>
                                        <p class="mb-0">{{ Str::limit($postingan->deskripsi, 150) }}</p>
                                    </div>
                                </div>
                              
                                               
                                            
                                <div class="card-footer user-pro-2">
                                    <div class="media mt-0">
                                        <div class="media-body">
                                            <h6 class="mb-0 mt-2 ms-2">{{ $postingan->jumlah_suka }} Menyukai Postingan Ini</h6>
                                        </div>
                                        <div class="ms-auto">
                                            <div class="d-flex mt-1">
                                                <a class="new me-2 text-muted fs-16" href="JavaScript:void(0);"><span class=""><i
                                                            class="fe fe-heart"></i></span></a>
                                                <a class="new me-2 text-muted fs-16" href="JavaScript:void(0);"><span class=""><i
                                                            class="fe fe-message-square"></i></span></a>
                                                <a class="new text-muted fs-16" href="JavaScript:void(0);"><span class=""><i
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

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

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
            const postId = $(this).data('id');

            Swal.fire({
                title: 'Konfirmasi Hapus',
                text: 'Apakah Anda yakin ingin menghapus postingan ini?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = '/admin/postingan/' + postId;
                }
            });
        });
    </script>
@endpush




{{-- LIST POSTINGAN DALAM BENTUK TABEL --}}
{{-- <div class="table-responsive">
    <table class="table table-bordered border text-nowrap mb-0" id="basic-edit">
        <thead>
            <tr class="text-center">
                <th>Judul Postingan</th>
                <th>Kategori</th>
                <th>Lokasi</th>
                <th>Rating</th>
                <th>Like</th>
                <th name="bstable-actions">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($postingans as $postingan)
            @if (count($postingans) > 0)
            <tr class="text-center">
                <td>{{ $postingan->judul_postingan }}</td>
                <td>{{ $postingan->kategori }}</td>
                <td>{{ $postingan->lokasi }}</td>
                <td>{{ $postingan->rating }}</td>
                <td>{{ $postingan->like }}</td>
                <td name="bstable-actions">
                    <div class="flex text-center">
                        <a href="{{ route('admin.postingan.edit', ['id' => $postingan->id]) }}" id="bEdit" type="button"
                            class="btn btn-warning">
                            <span class="fe fe-edit"> </span>
                        </a>
                        <button class="btn btn-danger" onclick="showCustomAlert({{ $postingan->id }})"><span
                                class="fe fe-trash-2"> </span></button>
                        <a href="{{ route('admin.postingan.show', $postingan->id) }}" id="bDel" type="button"
                            class="btn  btn-info">
                            <span class="fe fe-eye"> </span>
                        </a>
                    </div>
                </td>
            </tr>
            @else
            <p>Tidak ada postingan.</p>
            @endif
            @endforeach
        </tbody>
    </table>
</div> --}}