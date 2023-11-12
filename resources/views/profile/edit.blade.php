

<!-- resources/views/profiles/edit.blade.php -->

@extends('layouts.pengunjung.main')

@section('container')
<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-12 mt-6">
            <div class="card">
                <div class="card-header">{{ __('Update Profile and Password') }}</div>
    
                <div class="card-body">
                    @if (session('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                    @endif
    
                    <form method="POST" action="{{ route('profile.update') }}">
                        @csrf
                        @method('PUT')
    
    
                        <div class="form-group row">
                            <label for="nama_lengkap" class="col-md-4 col-form-label">{{ __('Full Name') }}</label>
    
                            <div class="col-md-12">
                                <input id="nama_lengkap" type="text"
                                    class="form-control @error('nama_lengkap') is-invalid @enderror" name="nama_lengkap"
                                    value="{{ old('nama_lengkap', $user['nama_lengkap']) }}" required
                                    autocomplete="nama_lengkap" autofocus>
    
                                @error('nama_lengkap')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
    
                        <div class="form-group row">
                            <label for="nra" class="col-md-4 col-form-label">NRA</label>
    
                            <div class="col-md-12">
                                <input id="nra" type="text" class="form-control @error('nra') is-invalid @enderror"
                                    name="nra" value="{{ old('nra', $user['nra']) }}" required autocomplete="nra" autofocus>
    
                                @error('nra')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
    
                        <div class="form-group row">
                            <label for="current_password" class="col-md-4 col-form-label">{{ __('Current Password')
                                }}</label>
    
                            <div class="col-md-12">
                                <input id="current_password" type="password"
                                    class="form-control @error('current_password') is-invalid @enderror"
                                    name="current_password" autocomplete="current-password">
    
                                @error('current_password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
    
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label">{{ __('New Password') }}</label>
    
                            <div class="col-md-12">
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password"
                                    autocomplete="new-password">
    
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
    
                        <div class="form-group row">
                            <label for="password_confirmation" class="col-md-4 col-form-label">{{ __('Confirm Password')
                                }}</label>
    
                            <div class="col-md-12">
                                <input id="password_confirmation" type="password" class="form-control"
                                    name="password_confirmation" autocomplete="new-password">
                            </div>
                        </div>
    
                        <div class="form-group row mb-0">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Update Profile') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    
    </div>
</div>
@endsection