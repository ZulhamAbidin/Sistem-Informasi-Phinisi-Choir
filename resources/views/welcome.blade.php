@extends('layouts.pengunjung.main')

@section('container')


@include('layouts.pengunjung.slider')

<div class="main-content w-full px-[var(--margin-x)]">


    @php
    $latestJumbotron = App\Models\Jumbotron::latest()->first();
    @endphp

    @if($latestJumbotron)
    <div class="mx-auto flex items-center justify-center bg-white">
            <div class="card">
                <div class="flex grow flex-col px-4 pb-5 pt-5 text-center sm:px-5">
                    <div class="mt-1">
                        <a href="#"
                            class="text-lg font-medium text-slate-700 hover:text-primary focus:text-primary dark:text-navy-100 dark:hover:text-accent-light dark:focus:text-accent-light">
                            {{ $latestJumbotron->judul }}</a>
                    </div>

                    <div class="my-2 flex items-center space-x-3 text-xs">
                        <div class="h-px flex-1 bg-slate-200 dark:bg-navy-500"></div>
                        <p>{{ $latestJumbotron->created_at->format('l j F Y') }}</p>
                        <div class="h-px flex-1 bg-slate-200 dark:bg-navy-500"></div>
                    </div>
                    <p class="my-2 grow text-center">
                        {{ $latestJumbotron->keterangan }}
                    </p>

                    <div>
                        <a href="{{ $latestJumbotron->link }}"
                            class="mt-4 btn bg-primary/10 font-medium text-primary hover:bg-primary/20 focus:bg-primary/20 active:bg-primary/25 dark:bg-accent-light/10 dark:text-accent-light dark:hover:bg-accent-light/20 dark:focus:bg-accent-light/20 dark:active:bg-accent-light/25">
                            {{ $latestJumbotron->teks_button }}
                        </a>
                    </div>
                </div>
            </div>
    </div>
    @else
    @endif

    {{-- postingan dengan rating tertinggi --}}
    <div class="mt-16 flex flex-col items-center justify-center">
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
                        <a href="{{ route('pengunjung.news.show', $postingan->id) }}"
                            class="text-base font-medium text-white">
                            {{ Str::limit($postingan->judul_postingan, 100) }}
                        </a>
                    </div>
                    <div class="flex items-center justify-between">
                        <div class="flex items-center text-xs text-slate-200">
                            <p class="flex items-center space-x-1">
                                <svg xmlns="../www.w3.org/2000/svg.html" class="h-3.5 w-3.5" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
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
                                <svg xmlns="../www.w3.org/2000/svg.html" class="h-4.5 w-4.5" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z">
                                    </path>
                                </svg>
                            </button>
                            <button x-tooltip="'Save'"
                                class="btn h-7 w-7 rounded-full p-0 text-navy-100 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                                <svg xmlns="../www.w3.org/2000/svg.html" class="h-4.5 w-4.5" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
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

    <form action="{{ route('welcome') }}" method="GET">
        <div class="relative flex flex-col items-center justify-center">
            <div class="relative mt-6 w-full max-w-md">
                <input
                    class="form-input peer h-12 w-full rounded-full border border-slate-300 bg-slate-50 px-4 py-2 pl-9 text-base placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:bg-navy-900 dark:hover:border-navy-400 dark:focus:border-accent"
                    placeholder="Search" name="search" type="text">
                <div
                    class="absolute left-0 top-0 flex h-12 w-10 items-center justify-center text-slate-400 peer-focus:text-primary dark:text-navy-300 dark:peer-focus:text-accent">
                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </div>
            </div>
        </div>
    </form>
</div>
<br>

@if($listberita->isNotEmpty())
@if (!is_null($posts) && count($posts) > 0)
<div class="mt-4 grid grid-cols-1 gap-4 sm:grid-cols-2 sm:gap-5 lg:grid-cols-3 lg:gap-6 xl:grid-cols-4 mx-4">
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
                {{ strlen(strip_tags($listberitas->deskripsi)) > 50 ? substr(strip_tags($listberitas->deskripsi), 0, 100) . '....' : strip_tags($listberitas->deskripsi) }}
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
<div class="flex mx-auto mt-5">
    {{ $listberita->links() }}
</div>

@else
<p>Anda Belum Mengunggah Postingan Apapun.</p>
@endif

@else
<div class="flex flex-col items-center p-6 text-center">
    <div class="w-full max-w-xs">
        <img class="w-16 flex mx-auto" " src=" {{ asset('assets/images/brand/logo-2.png') }}" alt="image">
    </div>
    <p class="pt-4 text-xl font-semibold text-slate-800 dark:text-navy-50">
        Oops. Hasil Pencarian Anda Tidak Ditemukan
    </p>
    <p class="pt-2 text-slate-500 dark:text-navy-200">
        Unit Kegiatan Paduan Suara Mahasiswa Universitas Negeri Makassar
    </p>
    <a href="{{ route('welcome') }}"
        class="btn mt-10 bg-primary/10 font-medium text-primary hover:bg-primary/20 focus:bg-primary/20 active:bg-primary/25 dark:bg-accent-light/10 dark:text-accent-light dark:hover:bg-accent-light/20 dark:focus:bg-accent-light/20 dark:active:bg-accent-light/25">
        Reset Pencarian </a>

</div>
@endif
{{-- end semua postingan --}}
<br>


<div id="testimonials" class="mt-4 pl-[var(--margin-x)] transition-all duration-[.25s] sm:mt-5 lg:mt-6">
    <div class="rounded-l-lg  pt-4 pb-1 dark:bg-navy-800">
        <h2 class="mt-8 text-xl font-medium text-center text-slate-600 dark:text-navy-100 lg:text-2xl">
            Testimonials
        </h2>
        <h2 class=" text-xl pb-4 mt-4 font-medium text-center text-slate-600 dark:text-navy-100 lg:text-xl">
            Apa pendapat orang orang mengenai Pinisi Choir
        </h2>

        <div x-init="$nextTick(()=>$el._x_swiper = new Swiper($el, {scrollbar: {el: '.swiper-scrollbar',draggable: true}, navigation: {prevEl: '.swiper-button-prev',nextEl: '.swiper-button-next'},autoplay: {delay: 2000}}))"
            class="swiper rounded-lg">
            <div class="swiper-wrapper">
                @foreach ($testimonials as $testimonial)
                <div class="swiper-slide">
                    <div class="card swiper-slide flex w-96 shrink-0 justify-between rounded-xl border-l-4 border-primary p-4 swiper-slide-active"
                        role="group" aria-label="1 / 6" style="margin-right: 18px;">
                        <div>
                            <div class="card grow items-center p-4 sm:p-5">
                                <div class="avatar h-28 w-28">
                                    <img class="rounded-full" src="{{ asset('storage/uploads/' . $testimonial->foto) }}" alt="avatar">
                                    <div
                                        class="absolute right-0 m-1 h-4 w-4 rounded-full border-2 border-white bg-primary dark:border-navy-700 dark:bg-accent">
                                    </div>
                                </div>
                                <h3 class="pt-3 text-lg font-medium text-slate-700 dark:text-navy-100">
                                    {{ $testimonial->name }}
                                </h3>
                                <p class="text-xs+ text-center text-slate-900 font-semibold  dark:text-navy-100">{{ $testimonial->jabatan }}</p>
                                <div class="my-4 h-px w-full bg-slate-200 dark:bg-navy-500"></div>
                                <p class="text-xs+ text-center text-slate-900 font-semibold  dark:text-navy-100">{{ $testimonial->content }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                    @endforeach
            </div>
            <div class="swiper-scrollbar"></div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>

    </div>
</div>

<br>

@include('layouts.pengunjung.footer')
@endsection
