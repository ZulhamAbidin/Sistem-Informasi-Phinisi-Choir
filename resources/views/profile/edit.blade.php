{{-- 


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
                            </div>                    </form>
                </div>
            </div>
        </div>
    
    </div>
</div>
@endsection --}}

<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=utf-8" />

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0" />
    <title>Login</title>
    <link rel="icon" type="image/png" href="{{ asset('assets/images/brand/logo-2.png') }}" />
    <link rel="stylesheet" href="{{ asset('lineone/css/app.css') }}" />
    <script src="{{ asset('lineone/js/app.js') }}" defer></script>
    <script>
        localStorage.getItem("_x_darkMode_on") === "true" &&
            document.documentElement.classList.add("dark");
    </script>
</head>

<body x-data class="is-header-blur" x-bind="$store.global.documentBody">

<div id="root" class="min-h-100vh flex grow bg-slate-50 dark:bg-navy-900" x-cloak>
    <main class="grid w-full grow grid-cols-1 place-items-center">
        <div class="w-full max-w-[50rem] p-4 sm:px-5">
            <div class="text-center">
                    <img class="mx-auto h-16 w-16" src="{{ asset('assets/images/brand/logo-2.png') }}" alt="logo" />
                    <div class="mt-4">
                        <h2 class="text-2xl font-semibold text-slate-600 dark:text-navy-100">
                            EDIT PROFILE DAN PASSWORD
                        </h2>
                    </div>
                </div>

                <div class="grid w-full grow grid-cols-2 gap-4 mt-4">

                    @if(session('success'))
                    <div class="alert mt-4 flex alert alert-success overflow-hidden rounded-lg border border-info text-info">
                        <div class="bg-info p-3 text-white">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <div class="px-4 py-3 text-xs+ sm:px-5" role="alert">>{{ session('success') }}</div>
                    </div>
                    @endif

                    <div class="card col-span-2 lg:col-span-1 rounded-lg p-5 lg:p-7">
                        <form method="POST" action="{{ route('profile.update') }}">
                            @csrf
                            @method('PUT')
                    
                            <label class="mt-4 block">
                                <span>Nama Lengkap</span>
                                <span class="relative mt-1.5 flex">
                                    <input name="nama_lengkap" autocomplete="nama_lengkap" autofocus
                                        class="form-input @error('nama_lengkap') is-invalid  @enderror peer w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 pl-9 placeholder:text-slate-400/70 hover:z-10 hover:border-slate-400 focus:z-10 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                        type="text" value="{{ old('nama_lengkap', $user['nama_lengkap']) }}" />
                                    <span
                                        class="pointer-events-none absolute flex h-full w-10 items-center justify-center text-slate-400 peer-focus:text-primary dark:text-navy-300 dark:peer-focus:text-accent">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 transition-colors duration-200" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                                d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                        </svg>
                                    </span>
                                </span>
                            </label>
                            @error('nama_lengkap')
                            <span class="invalid-feedback alert alert-error text-error" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                    
                            <label class="mt-4 block">
                                <span>NRA</span>
                                <span class="relative mt-1.5 flex">
                                    <input name="nra" autocomplete="nra" autofocus
                                        class="form-input @error('nra') is-invalid  @enderror peer w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 pl-9 placeholder:text-slate-400/70 hover:z-10 hover:border-slate-400 focus:z-10 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                        type="text" value="{{ old('nra', $user['nra']) }}" />
                                    <span
                                        class="pointer-events-none absolute flex h-full w-10 items-center justify-center text-slate-400 peer-focus:text-primary dark:text-navy-300 dark:peer-focus:text-accent">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 transition-colors duration-200" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                                d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                        </svg>
                                    </span>
                                </span>
                            </label>
                            @error('nra')
                            <span class="invalid-feedback alert alert-error text-error" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                    
                            <button type="submit"
                                class="btn mt-5 w-fit bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90">
                                Update
                            </button>
                        </form>
                    </div>
                    <div class="card col-span-2 lg:col-span-1 rounded-lg p-5 lg:p-7">
                        <form method="post" action="{{ route('password.update') }}" >
                            @csrf
                            @method('put')

                       
                      @if(session('error'))
                    <div class="alert mt-4 flex overflow-hidden rounded-lg border border-error text-error">
                        <div class="bg-error p-3 text-white">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <div class="px-4 py-3 text-xs+ sm:px-5">{{ session('error') }}</div>
                    </div>
                    @endif
                    
                    @if(session('status'))
                    <div class="alert mt-4 flex overflow-hidden rounded-lg border border-info text-info">
                        <div class="bg-info p-3 text-white">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <div class="px-4 py-3 text-xs+ sm:px-5">{{ session('status') }}</div>
                    </div>
                    @endif
                            
                            <label class="mt-4 block">
                                <span>Password Lama</span>
                                <span class="relative mt-1.5 flex">
                                    <input name="current_password" autocomplete="current_password" autofocus id="current_password" required
                                        class="form-input @error('current_password') is-invalid  @enderror peer w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 pl-9 placeholder:text-slate-400/70 hover:z-10 hover:border-slate-400 focus:z-10 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                        placeholder="Masukkan Password Lama" type="password" />
                                    <span
                                        class="pointer-events-none absolute flex h-full w-10 items-center justify-center text-slate-400 peer-focus:text-primary dark:text-navy-300 dark:peer-focus:text-accent">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 transition-colors duration-200" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                                d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                        </svg>
                                    </span>
                                </span>
                            </label>
                    
                            <label class="mt-4 block">
                                <span>Password Baru</span>
                                <span class="relative mt-1.5 flex">
                                    <input name="password" id="password" autocomplete="password" autofocus required
                                        class="form-input @error('password') is-invalid  @enderror peer w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 pl-9 placeholder:text-slate-400/70 hover:z-10 hover:border-slate-400 focus:z-10 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                        placeholder="Konfirmasi Password" type="password" />
                                    <span
                                        class="pointer-events-none absolute flex h-full w-10 items-center justify-center text-slate-400 peer-focus:text-primary dark:text-navy-300 dark:peer-focus:text-accent">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 transition-colors duration-200" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                                d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                        </svg>
                                    </span>
                                </span>
                            </label>
                    
                            <label class="mt-4 block">
                                <span>Konfirmasi Password Baru</span>
                                <span class="relative mt-1.5 flex">
                                    <input name="password_confirmation" autocomplete="password_confirmation" autofocus required
                                        id="password_confirmation" required
                                        class="form-input @error('password_confirmation') is-invalid  @enderror peer w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 pl-9 placeholder:text-slate-400/70 hover:z-10 hover:border-slate-400 focus:z-10 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                        placeholder="Konfirmasi Password baru" type="password" />
                                    <span
                                        class="pointer-events-none absolute flex h-full w-10 items-center justify-center text-slate-400 peer-focus:text-primary dark:text-navy-300 dark:peer-focus:text-accent">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 transition-colors duration-200" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                                d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                        </svg>
                                    </span>
                                </span>
                            </label>
                    
                            <button type="submit"
                                class="btn mt-5 w-fit bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90">
                                Update
                            </button>
                        </form>
                    </div>
                </div>
        </div>
    </main>
</div>

<div id="x-teleport-target"></div>
<script>
    window.addEventListener("DOMContentLoaded", () => Alpine.start());
</script>
</body>

</html>