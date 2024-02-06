



@extends('layouts.pengunjung.main')

@push('styles')
    @livewireStyles
@endpush

@push('scripts')
    @livewireScripts
@endpush

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
    <div id="semua-postingan" class="relative mt-10 flex flex-col items-center justify-center">
        <h2 class="mt-8 text-xl font-medium text-slate-600 dark:text-navy-100 lg:text-2xl">
            Semua Postingan
        </h2>
    </div>
    
    @livewire('postingan-table')


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
