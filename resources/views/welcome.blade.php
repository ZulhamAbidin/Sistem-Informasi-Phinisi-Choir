@extends('layouts.pengunjung.main')

@section('container')


    {{-- <div class="main-content mt-0">
        <div class="side-app">
            <div class="main-container">

                POSTINGAN DENGAN RATING TERTINGGI 
                <div class="section bg-landing" id="Blog">
                    <div class="container">
                        <div class="row">
                            <div class="card-body">
                                <h4 class="text-center fw-semibold">Postingan Dengan Rating Tertinggi </h4>
                                <span class="landing-title"></span>
                                <h2 class="text-center fw-semibold mb-7">Postingan</h2>

                            </div>
                        </div>
                    </div>
                </div>

                 TESTIMONIALS
                <div class="testimonial-owl-landing section pb-0" id="testimonials">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card bg-transparent">
                                    <div class="card-body pt-5">
                                        <h4 class="text-center fw-semibold text-white-80">Testimonials </h4>
                                        <span class="landing-title"></span>
                                        <h3 class="text-center fw-semibold text-white-80 mb-7">Bagaimana Pendapat Orang Mengenai Pinisi Choir</h3>
                                        <div class="testimonial-carousel">
                                            @foreach ($testimonials as $testimonial)
                                                <div class="slide text-center">
                                                    <div class="row">
                                                        <div class="col-xl-8 col-md-12 d-block mx-auto">
                                                            <div class="testimonia">
                                                                <p class="text-white-80">
                                                                    "{{ $testimonial->content }}"
                                                                </p>
                                                                <h3 class="title">{{ $testimonial->name }}</h3>
                                                                <span class="post mb-4">{{ $testimonial->jabatan }}</span>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <img class="rounded-circle d-block mx-auto" src="{{ asset('storage/uploads/' . $testimonial->foto) }}"  style="width: 120px; height: 120px; object-fit: cover;" alt="{{ $testimonial->name }}">
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                 SARAN DAN TANGGAPAN PENGGUNA -
                <div class="bg-image-landing section pb-0" id="Contact">
                    <div class="container">
                        <div class="">
                            <div class="card card-shadow reveal active">
                                <h4 class="text-center fw-semibold mt-7">Saran dan Tanggapan Penngguna</h4>
                                <span class="landing-title"></span>
                                </h2>
                                <div class="card-body p-5 pb-6 text-dark">
                                    <div class="statistics-info p-4">
                                        <div class="row justify-content-center">

                                            <div class="col-xl-9">
                                                <div class="">
                                                    <form class="form-horizontal reveal revealrotate m-t-20" action="{{ route('submit-saran') }}" method="post">
                                                        @csrf
                                                        <div class="form-group">
                                                            <div class="col-xs-12">
                                                                <input class="form-control" type="text" required="" placeholder="Username*" name="nama">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="col-xs-12">
                                                                <input class="form-control" type="email" required="" placeholder="Email*" name="email">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="col-xs-12">
                                                                <textarea class="form-control" rows="5" placeholder="Your Comment*" name="pesan"></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="">
                                                            <button type="submit" class="btn btn-primary btn-rounded waves-effect waves-light">Submit</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div> --}}

    
    @include('layouts.pengunjung.slider')
    
    <div class="main-content w-full px-[var(--margin-x)]">

        {{-- postingan dengan rating tertinggi --}}
        <div class="relative flex flex-col items-center justify-center">
            <h2 class="text-xl font-medium text-slate-600 dark:text-navy-100 lg:text-2xl">
                Postingan Populer Dengan Rating Tertinggi
            </h2>
        </div>
        <br>
        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 sm:gap-5 lg:grid-cols-2 lg:gap-6">
        @foreach ($posts as $postingan)
            <div class="card mt-10">
                <img class="h-72 w-full rounded-lg object-cover object-center"
                    src="{{ asset('storage/uploads/' . $postingan->sampul) }}" alt="image">
                <div class="absolute inset-0 flex h-full w-full flex-col justify-end">
                    <div
                        class="space-y-1.5 rounded-lg bg-gradient-to-t from-[#19213299] via-[#19213266] to-transparent px-4 pb-3 pt-12">
                        <div class="line-clamp-2">
                            <a href="{{ route('pengunjung.news.show', $postingan->id) }}" class="text-base font-medium text-white">
                                {{ Str::limit($postingan->judul_postingan, 100) }}
                            </a>
                        </div>
                        <div class="flex items-center justify-between">
                            <div class="flex items-center text-xs text-slate-200">
                                <p class="flex items-center space-x-1">
                                    <svg xmlns="../www.w3.org/2000/svg.html" class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2zM9 9h6v6H9V9z">
                                        </path>
                                    </svg>
                                    <span class="line-clamp-1">{{ $postingan->created_at->format('d F Y') }}</span>
                                </p>
                                <div class="mx-3 my-0.5 w-px self-stretch bg-white/20"></div>
                                <p class="shrink-0 text-tiny+">{{ $postingan->lokasi }}</p>
                            </div>
                            <div class="-mr-1.5 flex">
                                <button x-tooltip.secondary="'Like'"
                                    class="btn h-7 w-7 rounded-full p-0 text-secondary-light hover:bg-secondary/20 focus:bg-secondary/20 active:bg-secondary/25 dark:hover:bg-secondary-light/20 dark:focus:bg-secondary-light/20 dark:active:bg-secondary-light/25">
                                    <svg xmlns="../www.w3.org/2000/svg.html" class="h-4.5 w-4.5" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z">
                                        </path>
                                    </svg>
                                </button>
                                <button x-tooltip="'Save'"
                                    class="btn h-7 w-7 rounded-full p-0 text-navy-100 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                                    <svg xmlns="../www.w3.org/2000/svg.html" class="h-4.5 w-4.5" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z"></path>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        </div>
        {{-- end postingan dengan rating tertinggi --}}
        <br>



        {{-- Semua Postingan --}}
        <div class="relative mt-10 flex flex-col items-center justify-center">
            <h2 class="mt-8 text-xl font-medium text-slate-600 dark:text-navy-100 lg:text-2xl">
                Semua Postingan
            </h2>
        </div>
        <br>
        @if (!is_null($posts) && count($posts) > 0)
        <div class="mt-4 grid grid-cols-1 gap-4 sm:grid-cols-2 sm:gap-5 lg:grid-cols-3 lg:gap-6 xl:grid-cols-4">
            @foreach ($listberita as $listberitas)
            <div class="flex flex-col">
                <img class="h-44 w-full rounded-2xl object-cover object-center"
                    src="{{ asset('storage/uploads/' . $listberitas->sampul) }}" alt="image">
                <div class="card -mt-8 grow rounded-2xl p-4">
                    <div>
                        <a href="{{ route('pengunjung.news.show', $listberitas->id) }}"
                            class="text-sm+ font-medium text-slate-700 line-clamp-4 hover:text-primary focus:text-primary dark:text-navy-100 dark:hover:text-accent-light dark:focus:text-accent-light">
                            {{ Str::limit($listberitas->judul_postingan, 100) }}</a>
                    </div>
                    <p class="mt-2 grow line-clamp-3">
                        {{ Str::limit($listberitas->deskripsi, 100) }}
                    </p>
                    <div class="mt-4 flex items-center justify-between">
                        <a href="#" class="flex items-center space-x-2 text-xs hover:text-slate-800 dark:hover:text-navy-100">
                            <div class="avatar h-6 w-6">
                                <img class="rounded-full" src="{{ asset('assets/images/brand/logo-2.png') }}" alt="avatar">
                            </div>
                            <span class="line-clamp-1">Phinisi Choir</span>
                        </a>
                        <p class="flex shrink-0 items-center space-x-1.5 text-slate-400 dark:text-navy-300">
                            <svg xmlns="../www.w3.org/2000/svg.html" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                </path>
                            </svg>
                            <span class="text-xs">{{ $listberitas->created_at->format('d F Y') }}</span>
                        </p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @else
            <p>Anda Belum Mengunggah Postingan Apapun.</p>
        @endif
        {{-- end semua postingan --}}
        <br>

    </div>
    
    <div id="testimonials" class="mt-4 pl-[var(--margin-x)] transition-all duration-[.25s] sm:mt-5 lg:mt-6">
        <div class="rounded-l-lg bg-slate-150 pt-4 pb-1 dark:bg-navy-800">
            <h2 class="mt-8 text-xl font-medium text-center text-slate-600 dark:text-navy-100 lg:text-2xl">
                Testimonials
            </h2>
            <h2 class=" text-xl pb-4 mt-4 font-medium text-center text-slate-600 dark:text-navy-100 lg:text-xl">
                Apa pendapat orang orang mengenai Pinisi Choir
            </h2>
            <div class="scrollbar-sm mt-4 h-fit flex space-x-4 overflow-x-auto px-4 pb-4 sm:px-5" style="height: fit-content !important; ">
                @foreach ($testimonials as $testimonial)
               
                <div class="flex w-72 shrink-0 flex-col">
                    <img class="h-48 w-full rounded-2xl object-cover object-center" src="{{ asset('storage/uploads/' . $testimonial->foto) }}"
                        alt="image">
                    
                    <div class="card mx-2 h-fit -mt-8 grow rounded-2xl p-3.5" style="height: fit-content !important; ">
                        <div class="mt-2">
                            <div class="text-sm font-medium text-center text-slate-700 hover:text-primary focus:text-primary dark:text-navy-100 dark:hover:text-accent-light dark:focus:text-accent-light">
                                {{ $testimonial->content }}
                            </div>
                        </div>
                        <div class="text-center mt-2 pt-2">
                            <div class="text-xs text-slate-700 dark:text-navy-100 h-fit">{{ $testimonial->name }}</div>
                            <div class="text-xs text-slate-400 dark:text-navy-300 h-fit">{{ $testimonial->jabatan }}</div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    
    <br>

    @include('layouts.pengunjung.footer')
    @endsection