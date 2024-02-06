<ol class="pagination space-x-1.5">
    {{-- Previous Page Link --}}
    @if ($paginator->onFirstPage())
    <li>
        <span
            class="flex h-8 w-8 items-center justify-center rounded-lg bg-slate-150 text-slate-500 transition-colors cursor-default">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
            </svg>
        </span>
    </li>
    @else
    <li>
        <button wire:click="previousPage" rel="prev"
            class="flex h-8 w-8 items-center justify-center rounded-lg bg-slate-150 text-slate-500 transition-colors hover:bg-slate-300 focus:bg-slate-300 active:bg-slate-300/80 dark:bg-navy-500 dark:text-navy-200 dark:hover:bg-navy-450 dark:focus:bg-navy-450 dark:active:bg-navy-450/90">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
            </svg>
        </button>
    </li>
    @endif

    {{-- Pagination Elements --}}
    @foreach ($elements as $element)
    {{-- "Three Dots" Separator --}}
    @if (is_string($element))
    <li>
        <span
            class="flex h-8 min-w-[2rem] items-center justify-center rounded-lg bg-slate-150 px-3 leading-tight cursor-default">{{
            $element }}</span>
    </li>
    @endif

    {{-- Array Of Links --}}
    @if (is_array($element))
    @foreach ($element as $page => $url)
    @if ($page == $paginator->currentPage())
    <li>
        <span
            class="flex h-8 min-w-[2rem] items-center justify-center rounded-lg bg-primary px-3 leading-tight text-white transition-colors cursor-default">{{
            $page }}</span>
    </li>
    @else
    <li>
        <button wire:click.prevent="gotoPage({{ $page }})"
            class="flex h-8 min-w-[2rem] items-center justify-center rounded-lg bg-slate-150 px-3 leading-tight transition-colors hover:bg-slate-300 focus:bg-slate-300 active:bg-slate-300/80 dark:bg-navy-500 dark:hover:bg-navy-450 dark:focus:bg-navy-450 dark:active:bg-navy-450/90">{{
            $page }}</button>
    </li>
    @endif
    @endforeach
    @endif
    @endforeach

    {{-- Next Page Link --}}
    @if ($paginator->hasMorePages())
    <li>
        <button wire:click="nextPage" rel="next"
            class="flex h-8 w-8 items-center justify-center rounded-lg bg-slate-150 text-slate-500 transition-colors hover:bg-slate-300 focus:bg-slate-300 active:bg-slate-300/80 dark:bg-navy-500 dark:text-navy-200 dark:hover:bg-navy-450 dark:focus:bg-navy-450 dark:active:bg-navy-450/90">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
            </svg>
        </button>
    </li>
    @else
    <li>
        <span
            class="flex h-8 w-8 items-center justify-center rounded-lg bg-slate-150 text-slate-500 transition-colors cursor-default">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
            </svg>
        </span>
    </li>
    @endif
</ol>