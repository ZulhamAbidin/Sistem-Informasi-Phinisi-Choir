@extends('layouts.pengunjung.main')

@section('container')

    @if ($profiles && $profiles->count() > 0)
    
        @php

            $profile = $profiles->first();

        @endphp
        
        <div class="main-content w-full px-[var(--margin-x)]">

            <div class="grid grid-cols-1 mt-4">
                <div class="card px-5 py-12 sm:px-18">
                    <div>
                        <div class="text-center sm:text-left">
                            <img class="h-11 w-fit mx-auto transition-transform duration-500 rotate-[360deg]"
                                src="{{ asset('assets/images/brand/logo-3.png') }}" alt="logo" />
                            <div class="space-y-1 text-center mt-3 text-md">
                                Unit Kegiatan Paduan Suara Mahasiswa Universitas Negeri Makassar
                            </div>
                            <div class="space-y-1 text-center text-md">
                                Jl. Raya Pendidikan, Gn. Sari, Kec. Rappocini, Kota Makassar, Sulawesi Selatan 90222, Telepon {{ $profile->noponsel }}, Email psm.unm@gmail.com, 
                            </div>
                        </div>
                    </div>
                    <div class="my-7 h-px bg-slate-200 dark:bg-navy-500"></div>
                    <div class="">
                        
                        <div class="">
                            <p>{!! $profile->body !!}</p>
                        </div>
                    </div>
                    <div class="my-7 h-px bg-slate-200 dark:bg-navy-500"></div>

                   
                </div>
            </div>

            <div class="card mt-4">
                <div class="card  p-5 sm:mt-0 sm:flex-row btn bg-gradient-to-br from-purple-500 to-indigo-600 text-white">
                    
                    <div class="mt-2 flex-1 pt-2 text-center text-white sm:mt-0 sm:text-left">
                        <h3 class="text-xl">
                            Hadirkan <span class="font-semibold">Pinisi Choir</span> Dalam  Event Anda 
                        </h3>
                        <p class="mt-2 leading-relaxed">
                            <span class="font-semibold">Pinisi Choir</span> UNM merupakan pilihan tepat
                            untuk membuat acara Anda menjadi lebih istimewa. Dengan
                            harmoni suara yang
                            indah, kami siap memberikan pengalaman musik yang tak
                            terlupakan. Dapatkan nuansa berbeda dengan Mengundang
                            <span class="font-semibold">Pinisi Choir</span> UNM
                            untuk meramaikan acara Anda!
                        </p>
                        <a href="https://wa.me/{{ $profile->noponsel }}" target="_blank"
                            class="btn mt-6 bg-slate-50 text-slate-800 hover:bg-slate-200 focus:bg-slate-200 active:bg-slate-200/80">
                            <i class="fa-solid fa-phone text-xs pr-2"></i>Hubungi Kami
                        </A>
                    </div>
                </div>
            </div>

            <div class="text-center card mt-4 py-5">
                <h2 class="text-sm md:text-xl lg:text-xl text-center font-semibold uppercase text-slate-600 dark:text-navy-100">
                    Ayo Berkunjung Ke Tempat Kami
                </h2>
            </div>

            <div class="card mt-4">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3973.597102046322!2d119.43375837409967!3d-5.168327852190021!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dbee329d551a545%3A0x3798c730fc0df0a0!2sPinisi%20Choir!5e0!3m2!1sid!2sid!4v1699896890735!5m2!1sid!2sid"
                    width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>

        </div>

    @else

        <p>Tidak ada data profil lembaga.</p>

    @endif

    @include('layouts.pengunjung.footer')

@endsection
