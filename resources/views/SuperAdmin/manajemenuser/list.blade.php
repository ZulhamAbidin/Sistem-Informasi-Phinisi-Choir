@extends('layouts.main')
@section('container')
    <div class="main-container container-fluid">

        <div class="page-header">
            <h1 class="page-title">Kelola User Login</h1>
            <div>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Kelola User Login</a></li>
                    <li class="breadcrumb-item active" aria-current="page">List User</li>
                </ol>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 ">

                @foreach ($users as $user)
                    <div class="modal fade effect-scale show" id="confirmDeleteModal{{ $user->id }}" aria-modal="true"
                        role="dialog">
                        <div class="modal-dialog modal-dialog-centered text-center" role="document">
                            <div class="modal-content modal-content-demo">
                                <div class="modal-header">
                                    <h6 class="modal-title">
                                        <img src="{{ asset('assets/images/brand/logo-3.png') }}" alt=""
                                            class="me-2" height="30">
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
                                    <p class="card-text">Apakah kamu yakin ingin menghapus data
                                        {{ $user->nama_lengkap }} dengan peran
                                        {{ $user->role === 'super_admin' ? 'Admin Publikasi' : ($user->role === 'admin' ? 'Anggota' : 'Role Lainnya') }}
                                        ini?</p>
                                </div>
                                <div class="modal-footer">
                                    <a href="javascript:void(0)" class="btn btn-white"
                                        onclick="hideCustomAlert({{ $user->id }})">Cancel</a>
                                    <form action="{{ route('manajemenuser.destroy', ['id' => $user->id]) }}" method="POST">
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


            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered border text-nowrap mb-0" id="basic-edit">
                                <thead>
                                    <tr>
                                        <th>NAMA LENGKAP</th>
                                        <th>NRA</th>
                                        <th>Tanggal Daftar</th>
                                        <th>Status</th>
                                        <th>Role</th>
                                        <th name="bstable-actions">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                        <tr>
                                            <td>{{ $user->nama_lengkap }}</td>
                                            <td>{{ $user->nra }}</td>
                                            <td>{{ \Carbon\Carbon::parse($user->created_at)->isoFormat('H:mm, dddd D MMMM YYYY') }}
                                            </td>
                                            <td>{{ $user->status }}</td>
                                            <td>{{ $user->role === 'super_admin' ? 'Admin Publikasi' : ($user->role === 'admin' ? 'Anggota' : 'Role Lainnya') }}
                                            </td>
                                            <td name="bstable-actions">
                                                <div class="btn-list">
                                                    <a href="{{ route('manajemenuser.edit', ['id' => $user->id]) }}" id="bEdit" type="button"
                                                        class="btn btn-sm btn-primary"><span class="fe fe-edit">
                                                        </span></a>
                                                    <button id="bDel" type="button" class="btn  btn-sm btn-danger"
                                                        onclick="showCustomAlert({{ $user->id }})"> <span
                                                            class="fe fe-trash-2"> </span></button>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {{ $users->links('pagination::bootstrap-5') }}
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
