@extends('layouts.pengunjung.main')

@push('styles')
@livewireStyles
@endpush

@push('scripts')
@livewireScripts
@endpush

@section('container')
<div class="main-content w-full px-[var(--margin-x)]">

    {{-- postingan dengan rating tertinggi --}}
    <div class="relative flex flex-col items-center justify-center">
        <h2 class="mt-8 text-xl font-medium text-slate-600 dark:text-navy-100 lg:text-2xl">
            Postingan Dengan Kategori Kompetisi
        </h2>
    </div>

    @livewire('postingan-competition')
</div>


@include('layouts.pengunjung.footer')

@endsection
