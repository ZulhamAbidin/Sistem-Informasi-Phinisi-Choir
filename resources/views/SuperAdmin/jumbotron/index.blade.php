@extends('layouts.main')
@section('container')

<div class="main-container container-fluid">

    <div class="page-header">
        <h1 class="page-title">List Jumbotron</h1>
        <div>
            <div class="breadcrumb">
                <a href="{{ route('jumbotron.create') }}" class="btn btn-primary"><i
                        class="fa fa-plus-square me-2"></i>Tambah Jumbotron</a>
            </div>
        </div>
    </div>


    <div class="card">
        <div class="card-header">
            Daftar Jumbotron
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        {{-- <th>ID</th> --}}
                        <th>Judul</th>
                        <th>Link Tombol</th>
                        <th>Keterangan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($jumbotrons as $jumbotron)
                    <tr>
                        {{-- <td>{{ $jumbotron->id }}</td> --}}
                        <td>{{ $jumbotron->judul }}</td>
                        <td> <a href="{{ $jumbotron->link }}"class="btn btn-primary btn-sm" data-target="_blank">
                                {{ $jumbotron->teks_button }}
                             </a>
                         </td>
                        <td>{{ $jumbotron->keterangan }}</td>
                        <td class="d-flex">
                            <a href="{{ route('jumbotron.edit', $jumbotron->id) }}"
                                class="btn btn-warning btn-sm me-1">Edit</a>
                            <form action="{{ route('jumbotron.destroy', $jumbotron) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
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