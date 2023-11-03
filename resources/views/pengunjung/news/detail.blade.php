@extends('layouts.pengunjung.main')

@section('container')

    <div class="main-content mt-0">
        <div class="side-app">
            <div class="main-container">

                <div class="container">
                    <div class="page-header">
                        <h1 class="page-title"> {{ $beritadetail->judul_postingan }}</h1>
                        <div>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0)">Detail</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Berita</li>
                            </ol>
                        </div>
                    </div>

                    <style>
                        @media (max-width: 767px) {
                            .my-element {
                                display: none !important;
                            }
                        }

                        @media (min-width: 768px) and (max-width: 2500px) {
                            .my-element {
                                display: block !important;
                            }
                        }
                    </style>

                    <div class="card">
                        <img class="card-img-top card-img-bottom "
                            src="{{ asset('storage/uploads/' . $beritadetail->sampul) }}" alt="Card image cap">
                        <div class="card-body">
                            <div class="d-md-flex">
                                <a href="javascript:void(0);" class="d-flex me-4 mb-2"><i
                                        class="fe fe-clock fs-16 me-1 p-3 bg-secondary-transparent text-success bradius"></i>
                                    <div class="mt-3 ms-1 text-muted font-weight-semibold">{{ $beritadetail->selisihWaktu }}
                                    </div>
                                </a>
                                <a href="javascript:void(0);" class="d-flex mb-2 me-4"><i
                                        class="fe fe-camera fs-16 me-1 p-3 bg-secondary-transparent text-success bradius"></i>
                                    <div class="mt-3 ms-1 text-muted font-weight-semibold">{{ $beritadetail->sumber }}</div>
                                </a>
                                <a href="javascript:void(0);" class="d-flex me-4 mb-2"><i
                                        class="fe fe-map fs-16 me-1 p-3 bg-secondary-transparent text-success bradius"></i>
                                    <div class="mt-3 ms-1 text-muted font-weight-semibold">{{ $beritadetail->lokasi }}</div>
                                </a>
                                <a href="javascript:void(0);" class="d-flex me-4 mb-2"><i
                                        class="fe fe-calendar fs-16 me-1 p-3 bg-secondary-transparent text-success bradius"></i>
                                    <div class="mt-3 ms-1 text-muted font-weight-semibold">
                                        {{ $beritadetail->created_at->format('d F Y') }}</div>
                                </a>
                                <a href="javascript:void(0);" class="d-flex me-4 mb-2"><i
                                        class="fe fe-heart fs-16 me-1 p-3 bg-secondary-transparent text-success bradius"></i>
                                    <div class="mt-3 ms-1 text-muted font-weight-semibold">Like
                                        {{ $beritadetail->jumlah_suka }} </div>
                                </a>
                                <a href="javascript:void(0);" class="d-flex me-4 mb-2"><i
                                        class="fe fe-award fs-16 me-1 p-3 bg-secondary-transparent text-success bradius"></i>
                                    <div class="mt-3 ms-1 text-muted font-weight-semibold">Rating:
                                        {{ number_format($averageRating, 2) }} </div>
                                </a>
                                <div class="ms-auto">
                                    <a href="javascript:void(0);" class="d-flex mb-2"><i
                                            class="fe fe-message-square fs-16 me-1 p-3 bg-secondary-transparent text-success bradius"></i>
                                        <div class="mt-3 ms-1 text-muted font-weight-semibold">
                                            {{ $beritadetail->komentars_count }} Komentar</div>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <h3><a href="javascript:void(0)"> {{ $beritadetail->judul_postingan }}.</a></h3>
                            <p class="card-text">{{ $beritadetail->deskripsi }}.</p>
                        </div>
                        <div class="card-footer">
                            <div class="email-attch">
                                <p class="font-weight-semibold">Dokumentasi</p>
                            </div>
                            <div class="row attachments-doc">
                                @if ($beritadetail->gambar_pendukung)
                                    @foreach (explode(',', $beritadetail->gambar_pendukung) as $image)
                                        <div class="col-xl-3 col-lg-3 col-md-4 col-sm-4 mb-2 mb-sm-0">
                                            <div class="border overflow-hidden p-0 br-7">
                                                <a href=""><img src="{{ asset('storage/uploads/' . $image) }}"
                                                        class="card-img-top" alt="img"></a>
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                    Tidak ada gambar pendukung
                                @endif

                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>

        <div class="container">
            <div class="card body">
                <div class="card-header">
                    <div class="card-title">Comments</div>
                </div>

                @foreach ($beritadetail->komentars as $komentar)
                    <div class="card-body pb-0">
                        <div class="media mb-5 overflow-visible d-block d-sm-flex">
                            {{-- <div class="me-3 mb-2">
                            <a href="profile.html"> <img class="media-object rounded-circle thumb-sm" alt="64x64"
                                    src="../assets/images/users/5.jpg"> </a>
                        </div> --}}
                            <div class="media-body overflow-visible">
                                <div class="border mb-5 p-4 br-5">
                                    <h5 class="mt-0">{{ $komentar->nama }}</h5>
                                    <span><i class="fe fe-thumb-up text-danger"></i></span>
                                    <p class="font-13 text-muted">{{ $komentar->isi_komentar }}</p>
                                    <div class="mt-3 ms-1 text-muted font-weight-semibold">
                                        {{ $komentar->created_at->diffForHumans() }}
                                    </div>

                                    <span class="reply" data-commentid="{{ $komentar->id }}">
                                        <div class="reply-button mt-2">
                                            <span class="reply-badge btn-primary bg-primary rounded-pill py-1 btn-sm px-2">
                                                <i class="fe fe-corner-up-left mx-1"></i>Reply
                                            </span>
                                        </div>
                                    </span>

                                   <form method="POST" style="display: none;" class="comment-form mt-4" data-commentid="{{ $komentar->id }}"
                                    action="{{ route('pengunjung.news.tambah-balasan-komentar', ['beritadetail' => $beritadetail->id, 'komentarId' => $komentar->id]) }}">
                                    @csrf
                                    <div class="form-group">
                                        <input type="hidden" name="centang_biru" value="{{ Auth::check() ? 1 : 0 }}">
                                        <label for="nama">Nama</label>
                                        <?php
                                        $namaValue = '';
                                        $readonly = '';
                                        
                                        if (Auth::check()) {
                                            $user = auth()->user();
                                            if ($user->role === 'admin') {
                                                $namaValue = $user->nama_lengkap . ' (Anggota Pengurus)';
                                                $readonly = 'readonly';
                                            } else {
                                                $namaValue = $user->nama_lengkap;
                                            }
                                        } else {
                                            $namaValue = old('nama', '');
                                        }
                                        ?>
                                        <input type="text" class="form-control mb-2" id="nama" name="nama" placeholder="Nama lengkap" required
                                            value="{{ $namaValue }}" {{ $readonly }}>
                                        <label for="isi_balasan">Balas Komentar</label>
                                        <textarea name="isi_balasan" class="form-control @error('isi_balasan') is-invalid @enderror"
                                            rows="3">{{ old('isi_balasan') }}</textarea>
                                        @error('isi_balasan')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <button type="submit" class="btn btn-sm btn-primary">Balas</button>
                                </form>
                                </div>

                                {{-- komentar balasan --}}
                                @foreach ($komentar->balasanKomentars as $balasan)
                                @if ($balasan->parent_komentar_id === $komentar->id)
                                <div class="media mb-5 overflow-visible">
                                    <div class="me-6">
                                        {{-- <a href="profile.html"> <img class="media-object rounded-circle thumb-sm" alt="64x64"
                                                src="../assets/images/users/2.jpg"> </a> --}}
                                    </div>
                                    <div class="media-body border p-4 overflow-visible br-5">
                                        <h5 class="mt-0">
                                            @if ($balasan->centang_biru)
                                            <img src="{{ asset('assets/images/logo.webp') }}" alt="" class="img-fluid"
                                                style="width: 24px; height: 24px;"><!-- Tampilkan centang biru dengan ukuran fs-24 -->
                                            @endif
                                            @php
                                            $namaBalasan = $balasan->nama;
                                            $namaBalasan = str_replace('(Anggota Pengurus)', '<small>(anggota pengurus)</small>', $namaBalasan);
                                            @endphp
                                            {!! $namaBalasan !!}
                                        </h5>
                                        <span>
                                            <i class="fe fe-thumb-up text-danger"></i>
                                        </span>
                                        <p>{{ $balasan->isi_balasan }}</p>
                                    </div>
                                </div>
                                @endif
                                @endforeach
                                {{-- komentar balasan --}}


                            </div>
                        </div>
                    </div>
                @endforeach

            </div>

        </div>
    </div>


    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header">Tambah Komentar</div>

                    <div class="card-body">
                        <form method="post"
                            action="{{ route('pengunjung.news.komentar.tambah', ['id' => $beritadetail->id]) }}">
                            @csrf


                            <input type="hidden" name="postingan_id" value="{{ $beritadetail->id }}">
                            <!-- Gunakan ID dari $beritadetail -->

                            <div>
                                <label for="nama">Nama:</label>
                                <input type="text" id="nama" name="nama" value="{{ old('nama') }}">
                            </div>

                            <div>
                                <label for="isi_komentar">Komentar:</label>
                                <textarea id="isi_komentar" name="isi_komentar">{{ old('isi_komentar') }}</textarea>
                            </div>

                            <div>
                                <label for="rating">Rating (1-5):</label>
                                <input type="number" id="rating" name="rating" value="{{ old('rating') }}"
                                    min="1" max="5">
                            </div>

                            <button type="submit">Tambah Komentar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>







    <script>
        document.addEventListener('DOMContentLoaded', function () {
                const lihatKomentarButtons = document.querySelectorAll('.lihat-komentar-btn');
        
                lihatKomentarButtons.forEach(button => {
                    button.addEventListener('click', function () {
                        const commentId = button.getAttribute('data-commentid');
                        const targetElem = document.querySelector(`.balasan-komentar[data-commentid="${commentId}"]`);
                        
                        if (targetElem.style.display === 'none') {
                            targetElem.style.display = 'block';
                        } else {
                            targetElem.style.display = 'none';
                        }
                    });
                });
            });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const lihatKomentarButtons = document.querySelectorAll('.lihat-komentar-btn');
    
            lihatKomentarButtons.forEach(button => {
                button.addEventListener('click', function () {
                    const commentId = button.getAttribute('data-commentid');
                    const targetElem = document.querySelector(`.balasan-komentar[data-commentid="${commentId}"]`);
                    
                    if (targetElem.style.display === 'none') {
                        targetElem.style.display = 'block';
                    } else {
                        targetElem.style.display = 'none';
                    }
                });
            });
        });
    </script>
    
    
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const replyButtons = document.querySelectorAll('.reply-badge');
            const commentForms = document.querySelectorAll('.comment-form');
            
            replyButtons.forEach(button => {
                button.addEventListener('click', () => {
                    const commentId = button.closest('.reply').getAttribute('data-commentid');
                    const form = document.querySelector(`.comment-form[data-commentid="${commentId}"]`);
                    
                    form.style.display = 'block';
                });
            });
    
            document.addEventListener('click', (event) => {
                if (!event.target.closest('.comment-form') && !event.target.closest('.reply-badge')) {
                    commentForms.forEach(form => {
                        form.style.display = 'none';
                    });
                }
            });
        });
    </script>

@endsection
