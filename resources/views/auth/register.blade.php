<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=utf-8" />

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0" />
        <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Register</title>
    <link rel="icon" type="image/png" href="{{ asset('assets/images/brand/logo-2.png') }}" />
    <link rel="stylesheet" href="{{ asset('lineone/css/app.css') }}" />
    <script src="{{ asset('lineone/js/app.js') }}" defer></script>
    <script>
        localStorage.getItem("_x_darkMode_on") === "true" &&
            document.documentElement.classList.add("dark");
    </script>
</head>

<body x-data class="is-header-blur" x-bind="$store.global.documentBody">

    <div class="app-preloader fixed z-50 grid h-full w-full place-content-center bg-slate-50 dark:bg-navy-900">
        <img class="h-11 w-fit mx-auto transition-transform duration-500 rotate-[360deg]"
            src="{{ asset('assets/images/brand/logo-3.png') }}" alt="logo" />
        <p class="mt-3 font-semibold text-center mx-4"> UNIT KEGIATAN PADUAN SUARA MAHASISWA UNIVERSITAS NEGERI MAKASSAR
        </p>
    </div>

    <div id="root" class="min-h-100vh flex grow bg-slate-50 dark:bg-navy-900" x-cloak>
        @if($registrationStatus === '1')
        <main class="grid w-full grow grid-cols-1 place-items-center">
            <div class="w-full max-w-[26rem] p-4 sm:px-5">
                <div class="text-center">
                    <img class="mx-auto h-16 w-16" src="{{ asset('assets/images/brand/logo-2.png') }}" alt="logo" />
                    <div class="mt-4">
                        <h2 class="text-2xl font-semibold text-slate-600 dark:text-navy-100">
                            DAFTAR
                        </h2>
                        <p class="text-slate-400 dark:text-navy-300">
                            Silahkan daftar untuk melanjutkan
                        </p>
                    </div>
                </div>

                @if(session('error'))
                <div
                    class="my-5 alert flex overflow-hidden rounded-lg bg-error/10 text-error dark:bg-error-light/15 dark:text-error-light">
                    <div class="w-1.5 bg-error"></div>
                    <div class="p-4">{{ session('error') }}</div>
                </div>
                @endif

                @if(session('status'))
                <div
                    class="my-5 alert flex overflow-hidden rounded-lg bg-info/10 text-info dark:bg-info-light/15 dark:text-info-light">
                    <div class="w-1.5 bg-info"></div>
                    <div class="p-4">{{ session('status') }}</div>
                </div>
                @endif

                <div class="card mt-5 rounded-lg p-5 lg:p-7">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <label class="block">
    <span>Email</span>
    <span class="relative mt-1.5 flex">
        <input name="email" placeholder="Email"
            class="form-input @error('email') is-invalid  @enderror peer w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 pl-9 placeholder:text-slate-400/70 hover:z-10 hover:border-slate-400 focus:z-10 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
            type="email" required />

        <!-- Icon for email input -->
        <span class="pointer-events-none absolute flex h-full w-10 items-center justify-center text-slate-400 peer-focus:text-primary dark:text-navy-300 dark:peer-focus:text-accent">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 transition-colors duration-200" fill="none"
                viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                    d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
            </svg>
        </span>
    </span>

    <!-- Error message for email validation -->
    @error('email')
        <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
    @enderror
</label>


                        <label class="mt-4 block ">
                            <span>Nama Lengkap Anggota</span>
                            <span class="relative mt-1.5 flex">
                                <input name="nama_lengkap" placeholder="Arfah Awaluddin T"
                                    class="form-input @error('nama_lengkap') is-invalid  @enderror peer w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 pl-9 placeholder:text-slate-400/70 hover:z-10 hover:border-slate-400 focus:z-10 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                    type="text" required />
                                <span
                                    class="pointer-events-none absolute flex h-full w-10 items-center justify-center text-slate-400 peer-focus:text-primary dark:text-navy-300 dark:peer-focus:text-accent">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="h-5 w-5 transition-colors duration-200" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                            d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                    </svg>
                                </span>
                            </span>
                        </label>


                        <label class="mt-4 block">
                            <span>NRA (Nomor Registrasi Anggota)</span>
                            <span class="relative mt-1.5 flex">
                                <input name="nra" placeholder="G10.015.2021"
                                    class="form-input @error('nra') is-invalid  @enderror peer w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 pl-9 placeholder:text-slate-400/70 hover:z-10 hover:border-slate-400 focus:z-10 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                    type="text" required />
                                <span
                                    class="pointer-events-none absolute flex h-full w-10 items-center justify-center text-slate-400 peer-focus:text-primary dark:text-navy-300 dark:peer-focus:text-accent">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="h-5 w-5 transition-colors duration-200" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                            d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                    </svg>
                                </span>
                            </span>
                        </label>
                        @error('nra')
                        <span class="text-xs+ text-error" role="alert">
                            {{ $message }}
                        </span>
                        @enderror


                        <label class="mt-4 block">
                            <span>Password:</span>
                            <span class="relative mt-1.5 flex">
                                <input name="password" id="password" required
                                    class="form-input @error('password') is-invalid  @enderror peer w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 pl-9 placeholder:text-slate-400/70 hover:z-10 hover:border-slate-400 focus:z-10 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                    placeholder="Enter Password" type="password" />
                                <span
                                    class="pointer-events-none absolute flex h-full w-10 items-center justify-center text-slate-400 peer-focus:text-primary dark:text-navy-300 dark:peer-focus:text-accent">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="h-5 w-5 transition-colors duration-200" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                            d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                    </svg>
                                </span>
                            </span>
                        </label>
                        @error('password')
                        <span class="text-xs+ text-error" role="alert">
                            {{ $message }}
                        </span>
                        @enderror

                        <label class="mt-4 block">
                            <span>Password:</span>
                            <span class="relative mt-1.5 flex">
                                <input name="password_confirmation" id="password" required
                                    class="form-input @error('password') is-invalid  @enderror peer w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 pl-9 placeholder:text-slate-400/70 hover:z-10 hover:border-slate-400 focus:z-10 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                    placeholder="Enter Password Confirmation" type="password" />
                                <span
                                    class="pointer-events-none absolute flex h-full w-10 items-center justify-center text-slate-400 peer-focus:text-primary dark:text-navy-300 dark:peer-focus:text-accent">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="h-5 w-5 transition-colors duration-200" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                            d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                    </svg>
                                </span>
                            </span>
                        </label>
                        @error('password')
                        <span class="text-xs+ text-error" role="alert">
                            {{ $message }}
                        </span>
                        @enderror

                        <button type="submit"
                            class="btn mt-5 w-full bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90">
                            Sign In
                        </button>
                        <div class="mt-4 text-center text-xs+">
                            <p class="line-clamp-2">
                                <span>Anda Sudah Memiliki Akun?</span>
                                <a class="text-primary transition-colors hover:text-primary-focus dark:text-accent-light dark:hover:text-accent"
                                    href="login">Login Sebagai Anggota Paduan Suara UNM</a>
                            </p>
                        </div>
                    </form>
                </div>
                <div class="mt-8 flex justify-center text-xs text-slate-400 dark:text-navy-300">
                    <a href="#">Privacy Notice</a>
                    <div class="mx-3 my-1 w-px bg-slate-200 dark:bg-navy-500"></div>
                    <a href="#">Term of service</a>
                </div>
            </div>
        </main>
        @else
        <main class="grid w-full grow grid-cols-1 place-items-center">
            <div class="w-full max-w-[26rem] p-4 sm:px-5">
                <div class="text-center">
                    <img class="mx-auto h-16 w-16" src="{{ asset('assets/images/brand/logo-2.png') }}" alt="logo" />
                    <div class="mt-4">
                        <h4 class="text-lg font-semibold text-slate-600 dark:text-navy-100">
                            REGISTRASI AKUN ANGGOTA SAAT INI SEDANG DITUTUP
                        </h4>
                    </div>
                </div>
            </div>
        </main>
        @endif
    </div>

    <div id="x-teleport-target"></div>
    <script>
        window.addEventListener("DOMContentLoaded", () => Alpine.start());
    </script>
</body>

</html>