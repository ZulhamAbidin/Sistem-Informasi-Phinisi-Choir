<div>
    <div>
        <div>
            <div class="relative flex flex-col items-center justify-center">
                <div class="relative mt-6 w-full max-w-md">
                    <input wire:model="search" wire:keydown="triggerSearch"
                        class="form-input peer h-12 w-full rounded-full border border-slate-300 bg-slate-50 px-4 py-2 pl-9 text-base placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:bg-navy-900 dark:hover:border-navy-400 dark:focus:border-accent"
                        placeholder="search" type="text">
                    <div
                        class="absolute left-0 top-0 flex h-12 w-10 items-center justify-center text-slate-400 peer-focus:text-primary dark:text-navy-300 dark:peer-focus:text-accent">
                        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </div>
                </div>
            </div>
    
            <br>
    
            <div class="mt-4 grid grid-cols-1 gap-4 sm:grid-cols-2 sm:gap-5 lg:grid-cols-3 lg:gap-6 xl:grid-cols-4 mx-4">
                @foreach ($postingans as $postingan)
                <div class="flex flex-col">
                    <img class="h-44 w-full rounded-2xl object-cover object-center"
                        src="{{ asset('storage/uploads/' . $postingan->sampul) }}" alt="image">
                    <div class="card -mt-8 grow rounded-2xl p-4">
                        <div>
                            <a href="{{ route('pengunjung.news.show', $postingan->id) }}"
                                class="text-sm+ font-medium text-slate-700 line-clamp-4 hover:text-primary focus:text-primary dark:text-navy-100 dark:hover:text-accent-light dark:focus:text-accent-light">
                                {{ Str::limit($postingan->judul_postingan, 100) }}</a>
                        </div>
                        <p class="mt-2 grow line-clamp-3">
                            {{ strlen(strip_tags($postingan->deskripsi)) > 50 ? substr(strip_tags($postingan->deskripsi), 0,
                            100) . '....' : strip_tags($postingan->deskripsi) }}
                        </p>
                        <div class="mt-4 flex items-center justify-between">
                            <a href="#"
                                class="flex items-center space-x-2 text-xs hover:text-slate-800 dark:hover:text-navy-100">
                                <div class="avatar h-6 w-6">
                                    <img class="rounded-full" src="{{ asset('assets/images/brand/logo-2.png') }}"
                                        alt="avatar">
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
                                <span class="text-xs">{{ $postingan->created_at->format('d F Y') }}</span>
                            </p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
    
            <div class="flex mx-auto mt-5 justify-center">
                {{ $postingans->links() }}
            </div>
    
        </div>
    </div>
</div>
