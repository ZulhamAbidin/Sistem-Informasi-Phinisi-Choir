@extends('layouts.main')
@section('container')
    <div class="main-container container-fluid">
        {{-- <div class="page-header">
            <h1 class="page-title">Lihat Data Anggota</h1>
            <div>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Lihat</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Data Anggota</li>
                </ol>
            </div>
        </div> --}}

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
    


    <div class="row justify-content-center mt-4">

        <div class="col-md-12 ">

            @foreach ($anggota as $anggotas)
                <div class="modal fade effect-scale show" id="confirmDeleteModal{{ $anggotas->id }}" aria-modal="true"
                    role="dialog">
                    <div class="modal-dialog modal-dialog-centered text-center" role="document">
                        <div class="modal-content modal-content-demo">
                            <div class="modal-header">
                                <h6 class="modal-title">
                                    <img src="{{ asset('assets/images/brand/logo-3.png') }}" alt="" class="me-2"
                                        height="30">
                                </h6><button aria-label="Close" class="btn-close" data-bs-dismiss="modal"><span
                                        aria-hidden="true">×</span></button>
                            </div>
                            <div class="modal-body">
                                <h6><span class="">
                                        <svg xmlns="http://www.w3.org/2000/svg" height="60" width="60"
                                            viewBox="0 0 24 24">
                                            <path fill="#f07f8f"
                                                d="M20.05713,22H3.94287A3.02288,3.02288,0,0,1,1.3252,17.46631L9.38232,3.51123a3.02272,3.02272,0,0,1,5.23536,0L22.6748,17.46631A3.02288,3.02288,0,0,1,20.05713,22Z">
                                            </path>
                                            <circle cx="12" cy="17" r="1" fill="#e62a45"></circle>
                                            <path fill="#e62a45"
                                                d="M12,14a1,1,0,0,1-1-1V9a1,1,0,0,1,2,0v4A1,1,0,0,1,12,14Z"></path>
                                        </svg>
                                    </span>
                                </h6>
                                <h4 class="h4 mb-3 mt-3">Peringatan</h4>
                                <p class="card-text">Apakah kamu yakin ingin menghapus data anggota
                                    {{ $anggotas->nama_lengkap }} ini?</p>
                            </div>
                            <div class="modal-footer">
                                <a href="javascript:void(0)" class="btn btn-white"
                                    onclick="hideCustomAlert({{ $anggotas->id }})">Cancel</a>
                                <form action="{{ route('dataanggota.destroy', ['id' => $anggotas->id]) }}" method="POST">
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
                    <div class="row">
                        @foreach ($anggota as $anggotas)
                        <div class="col-12 col-md-6 col-lg-4">
        
                            <div class="card-body">
                                <div class="d-flex">
                                    <div class="media mt-0">
                                        <div class="media-user me-2">
                                            <div class=""><img alt="" class="rounded-circle avatar avatar-md" style="width: 50px; height: 50px; object-fit: cover;"
                                                    src="{{ asset('storage/uploads/' . $anggotas->foto) }}"></div>
                                        </div>
                                        <div class="media-body">
                                            <h6 class="mb-0 mt-1">{{ $anggotas->nama_lengkap }}</h6>
                                            <small class="text-muted">{{ $anggotas->jabatan }}</small><br>
                                            <small class="text-muted">{{ $anggotas->created_at->format('d F Y H:i') }}</small>
                                        </div>
                                    </div>
        
                                    <div class="ms-auto">
                                        <div class="dropdown show">
                                            <a class="new option-dots" href="JavaScript:void(0);" data-bs-toggle="dropdown">
                                                <span class=""><i class="fe fe-more-vertical"></i></span>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <a class="dropdown-item" href="{{ route('dataanggota.edit', ['id' => $anggotas->id]) }}">Edit  Anggota </a>
                                                <a class="dropdown-item" href="{{ route('detail.anggota', ['id' => $anggotas->id]) }}">Lihat Detail  Anggota </a>
                                                <button class="dropdown-item" onclick="showCustomAlert({{ $anggotas->id }})">Hapus  Anggota</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <div class="card-footer">
            {{ $anggota->links('pagination::bootstrap-5') }}
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
