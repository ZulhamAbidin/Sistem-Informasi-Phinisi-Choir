@extends('layouts.main')
@section('container')

<div class="main-container container-fluid">
    <div class="page-header">
        <h1 class="page-title">Profile Lembaga</h1>
    </div>
</div>

<div class="row justify-content-center mt-4">
    <div class="row row-cols-4">
        @if ($profiles && $profiles->count() > 0)
        @php
        $profile = $profiles->first();
        @endphp

        <div class="col-12">
            <div class="card">
                <div class="product-grid6">
                    <div class="product-image6 p-5">
                        <ul class="icons">
                            <li>
                                <a href="{{ route('profile-lembaga.edit', ['id' => $profile->id]) }}"
                                    class="btn btn-success">
                                    <i class="fe fe-edit"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body pt-0 pb-0">
                        <div class="product-content text-center">
                            <div>
                                {!! $profile->body !!}
                            </div>
                        </div>
                    </div>
                    {{-- <h1 class="title fw-bold fs-20"><a href="#">{{ $profile->noponsel }}</a></h1> --}}
                </div>
            </div>
        </div>
        @else
        <p>Tidak ada data profil lembaga.</p>
        @endif
    </div>
</div>

@endsection