<ol class="pagination">
    @if ($paginator->hasPages())

    {{-- Previous Page Link --}}
    @if ($paginator->onFirstPage())
    <li class="rounded-l-lg bg-slate-150 dark:bg-navy-500 cursor-not-allowed">
        <a href="#" class="flex h-8 w-8 items-center justify-center rounded-lg text-slate-500">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewbox="0 0 24 24"
                stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
            </svg>
        </a>
    </li>
    @else
    <li class="rounded-l-lg bg-slate-150 dark:bg-navy-500">
        <a href="{{ $paginator->previousPageUrl() }}"
            class="flex h-8 w-8 items-center justify-center rounded-lg text-slate-500 transition-colors hover:bg-slate-300 focus:bg-slate-300 active:bg-slate-300/80 dark:text-navy-200 dark:hover:bg-navy-450 dark:focus:bg-navy-450 dark:active:bg-navy-450/90">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewbox="0 0 24 24"
                stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
            </svg><!-- Isi dengan ikon atau teks untuk halaman sebelumnya -->
        </a>
    </li>
    @endif

    {{-- Pagination Elements --}}
    @foreach ($elements as $element)
    {{-- "Three Dots" Separator --}}
    @if (is_string($element))
    <li>
        <span
            class=" relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium text-gray-700 bg-white border border-gray-300 cursor-default leading-5">{{
            $element }}</span>
    </li>
    @endif

    {{-- Array Of Links --}}
    @if (is_array($element))
    @foreach ($element as $page => $url)
    <li class="{{ $page == $paginator->currentPage() ? 'flex h-8 items-center justify-center rounded-lg bg-primary  leading-tight text-white transition-colors
    hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus
    dark:focus:bg-accent-focus dark:active:bg-accent/90"' : 'bg-slate-150 dark:bg-navy-500' }}">
        <a href="{{ $url }}"
            class="flex h-8 min-w-[2rem] items-center justify-center rounded-lg px-3 leading-tight transition-colors hover:bg-slate-300 focus:bg-slate-300 active:bg-slate-300/80 dark:hover:bg-navy-450 dark:focus:bg-navy-450 dark:active:bg-navy-450/90">
            {{ $page }}
        </a>
    </li>
    @endforeach
    @endif
    @endforeach

    {{-- Next Page Link --}}
    @if ($paginator->hasMorePages())
    <li class="rounded-r-lg bg-slate-150 dark:bg-navy-500">
        <a href="{{ $paginator->nextPageUrl() }}"
            class="flex h-8 w-8 items-center justify-center rounded-lg text-slate-500 transition-colors hover:bg-slate-300 focus:bg-slate-300 active:bg-slate-300/80 dark:text-navy-200 dark:hover:bg-navy-450 dark:focus:bg-navy-450 dark:active:bg-navy-450/90">
            <!-- Isi dengan ikon atau teks untuk halaman selanjutnya -->
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewbox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
            </svg>
        </a>
    </li>
    @else
    <li class="rounded-r-lg bg-slate-150 dark:bg-navy-500 cursor-not-allowed">
        <a href="#" class="flex h-8 w-8 items-center justify-center rounded-lg text-slate-500">
            <!-- Isi dengan ikon atau teks untuk halaman terakhir -->
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewbox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
            </svg>
        </a>
    </li>
    @endif
    @endif


</ol>