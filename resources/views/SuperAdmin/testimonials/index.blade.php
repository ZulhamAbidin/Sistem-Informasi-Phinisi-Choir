@extends('layouts.main')
@section('container')
<div class="main-container container-fluid">
    {{-- <div class="page-header">
        <h1 class="page-title">List testimonial</h1>
        <div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">List</a></li>
                <li class="breadcrumb-item active" aria-current="page">testimonial</li>
            </ol>
        </div>
    </div> --}}

    <div class="page-header">
        <h1 class="page-title">List testimonial</h1>
        <div>
            <div class="breadcrumb">
                <a href="{{ route('testimonials.create') }}" class="btn btn-primary"><i class="fa fa-plus-square me-2"></i>Tambah Testimonial</a>
            </div>
        </div>
    </div>
</div>


<div class="row justify-content-center mt-4">

    <div class="col-md-12 ">

        @foreach ($testimonials as $testimonial)
        <div class="modal fade effect-scale show" id="confirmDeleteModal{{ $testimonial->id }}" aria-modal="true"
            role="dialog">
            <div class="modal-dialog modal-dialog-centered text-center" role="document">
                <div class="modal-content modal-content-demo">
                    <div class="modal-header">
                        <h6 class="modal-title">
                            <img src="{{ asset('assets/images/brand/logo-3.png') }}" alt="" class="me-2" height="30">
                        </h6><button aria-label="Close" class="btn-close" data-bs-dismiss="modal"><span
                                aria-hidden="true">×</span></button>
                    </div>
                    <div class="modal-body">
                        <h6><span class="">
                                <svg xmlns="http://www.w3.org/2000/svg" height="60" width="60" viewBox="0 0 24 24">
                                    <path fill="#f07f8f"
                                        d="M20.05713,22H3.94287A3.02288,3.02288,0,0,1,1.3252,17.46631L9.38232,3.51123a3.02272,3.02272,0,0,1,5.23536,0L22.6748,17.46631A3.02288,3.02288,0,0,1,20.05713,22Z">
                                    </path>
                                    <circle cx="12" cy="17" r="1" fill="#e62a45"></circle>
                                    <path fill="#e62a45" d="M12,14a1,1,0,0,1-1-1V9a1,1,0,0,1,2,0v4A1,1,0,0,1,12,14Z">
                                    </path>
                                </svg>
                            </span>
                        </h6>
                        <h4 class="h4 mb-3 mt-3">Peringatan</h4>
                        <p class="card-text">Apakah kamu yakin ingin menghapus testimonial {{ $testimonial->nama }} ini?</p>
                    </div>
                    <div class="modal-footer">
                        <a href="javascript:void(0)" class="btn btn-white"
                            onclick="hideCustomAlert({{ $testimonial->id }})">Cancel</a>
                        <form action="{{ route('testimonials.destroy', ['id' => $testimonial->id]) }}" method="POST">
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
   

    <div class="row row-cols-4">
        @foreach ($testimonials as $testimonial)
        <div class="col-md-6 col-xl-4 col-sm-6">
            <div class="card">
                <div class="product-grid6">
                    <div class="product-image6 p-5">
                        <ul class="icons">

                            <li>
                                <a href="{{ route('testimonials.edit', ['id' => $testimonial->id]) }}"
                                    class="btn btn-success">
                                    <i class="fe fe-edit"></i>
                                </a>
                            </li>

                            <li>
                                <button class="btn btn-danger" onclick="showCustomAlert({{ $testimonial->id }})">
                                    <i class="fe fe-x"></i>
                                </button>
                            </li>

                        </ul>
                        <a href="{{ route('detail.anggota', ['id' => $testimonial->id]) }}">
                            <img class="rounded-circle d-block mx-auto"
                                style="width: 100px; height: 100px; object-fit: cover;"
                                src="{{ asset('storage/uploads/' . $testimonial->foto) }}" alt="img">
                        </a>
                    </div>
                    <div class="card-body pt-0 pb-0">
                        <div class="product-content text-center">
                            <h1 class="title fw-bold fs-20"><a href="#">{{ $testimonial->name }}</a></h1>
                            <p class=""><a href="#">{{ $testimonial->jabatan }}</a></p>
                            <p class="pb-4">"{{ $testimonial->content }}"</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach

        <div class="col-md-12">
            {{ $testimonials->links('pagination::bootstrap-5') }}
        </div>

        <div class="col-md-12">
            <a href="{{ route('welcome') }}/#testimonials" class="btn btn-primary">Lihat Hasil</a>
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