{{-- @extends('layouts.pengunjung.main')

@section('container')

<div class="main-content mt-0">
    <div class="side-app">
        <div class="main-container">

            <div class="section bg-landing" id="Blog">
                <div class="container">

                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('ListBerita') }}" method="GET">
                                <div class="input-group mb-2">
                                    <input type="text" name="search" value="{{ $search }}" class="form-control"
                                        id="search" placeholder="Searching.....">
                                    <button type="submit"
                                        class="input-group-text btn btn-sm btn-primary">Search</button>
                                    <a href="{{ route('ListBerita') }}" class="input-group-text btn btn-sm btn-primary"
                                        id="showAll">X</a>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                @if (!is_null($listAchievement) && count($listAchievement) > 0)
                                @foreach ($listAchievement as $postingan)
                                <div class="col-12 col-md-6 col-lg-4 reveal revealrotate active">
                                    <div class="card border p-0 shadow-none">
                                        <div class="card-body">
                                            <div class="d-flex">
                                                <div class="media mt-0">
                                                    <div class="media-user me-2">
                                                        <div class=""><img alt=""
                                                                class="rounded-circle avatar avatar-md"
                                                                src="{{ asset('assets/images/brand/logo-2.png') }}">
                                                        </div>
                                                    </div>
                                                    <div class="media-body">
                                                        <h6 class="mb-0 mt-1">
                                                            {{ $postingan->sumber }}
                                                        </h6>
                                                        <small class="text-muted">
                                                            {{ $postingan->created_at->diffForHumans() }}
                                                        </small>
                                                    </div>
                                                </div>
                                                <div class="ms-auto">
                                                    <div class="dropdown show">
                                                        <a class="new option-dots" href="JavaScript:void(0);"
                                                            data-bs-toggle="dropdown">
                                                            <span class=""><i class="fe fe-more-vertical"></i></span>
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-end">
                                                            <a class="dropdown-item"
                                                                href="{{ route('pengunjung.news.show', $postingan->id) }}">
                                                                Lihat Postingan
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mt-4">
                                                <div class="d-flex">
                                                    <a href="{{ route('pengunjung.news.show', $postingan->id) }}"
                                                        class="w-100">
                                                        <img src="{{ asset('storage/uploads/' . $postingan->sampul) }}"
                                                            alt="img" class="br-5">
                                                    </a>
                                                </div>
                                                <h4 class="fw-semibold mt-3">
                                                    {{ $postingan->judul_postingan }}
                                                </h4>
                                                <p class="mb-0">
                                                    {{ Str::limit($postingan->deskripsi, 150) }}
                                                </p>
                                            </div>
                                        </div>
                                        <div class="card-footer user-pro-2">
                                            <div class="media mt-0">
                                                <div class="ms-auto">
                                                    <div class="d-flex mt-1">
                                                        <a class="new me-2 text-muted fs-16" href="JavaScript:void(0);">
                                                            <span class=""><i class="fe fe-heart"></i></span>
                                                        </a>
                                                        <a class="new me-2 text-muted fs-16" href="JavaScript:void(0);">
                                                            <span class=""><i class="fe fe-message-square"></i></span>
                                                        </a>
                                                        <a class="new text-muted fs-16" href="JavaScript:void(0);">
                                                            <span class=""><i class="fe fe-share-2"></i></span>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                @else
                                <p>Admin Belum Mengunggah Postingan Yang Serupa Dengan Pencarian Anda.</p>
                                @endif
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>


<script>
    document.getElementById('showAll').addEventListener('click', function(event) {
            document.getElementById('search').value = '';
        });
</script>

@endsection --}}

@extends('layouts.pengunjung.main')

@section('container')
<div class="main-content w-full px-[var(--margin-x)]">

    {{-- postingan dengan rating tertinggi --}}
    <div class="relative flex flex-col items-center justify-center">
        <h2 class="mt-8 text-xl font-medium text-slate-600 dark:text-navy-100 lg:text-2xl">
            Postingan Dengan Kategori Achievement
        </h2>
    </div>

    <form action="{{ route('ListAchievement') }}" method="GET">
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
</div>
</form>

@if($ListAchievement->isNotEmpty())
<div class="grid grid-cols-1 gap-4 sm:grid-cols-2 sm:gap-5 lg:grid-cols-3 lg:gap-6 mx-4">
    @foreach ($ListAchievement as $postingan)
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
    {{ $ListAchievement->links() }}
</div>
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
    <a href="{{ route('ListAchievement') }}"
        class="btn mt-10 bg-primary/10 font-medium text-primary hover:bg-primary/20 focus:bg-primary/20 active:bg-primary/25 dark:bg-accent-light/10 dark:text-accent-light dark:hover:bg-accent-light/20 dark:focus:bg-accent-light/20 dark:active:bg-accent-light/25">
        Reset Pencarian </a>

</div>
@endif

</div>


@include('layouts.pengunjung.footer')

@endsection