{{-- @extends('layouts.pengunjung.main')

@section('container')
    <div class="main-content">
        <div class="side-app">
            <div class="main-container container-fluid">

                <div class="container mt-4 pt-5">
                    <br>
                    <div class="row">

                        <div class="col-12 col-lg-9">

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

                                .tai {
                                    border: none !important;
                                    outline: none !important;
                                    background: transparent !important
                                }
                            </style>

                            <div class="card">

                                <div id="carousel-controls" class="carousel slide" data-bs-ride="carousel">

                                    <div class="carousel-inner">
                                        <div class="carousel-item active">
                                            <img class="d-block w-100 br-5" alt=""
                                                src="{{ asset('storage/uploads/' . $beritadetail->sampul) }}"
                                                data-bs-holder-rendered="true">
                                        </div>

                                        @foreach (explode(',', $beritadetail->gambar_pendukung) as $image)
                                            <div class="carousel-item">
                                                <img class="d-block w-100 br-5" alt=""
                                                    src="{{ asset('storage/uploads/' . $image) }}"
                                                    data-bs-holder-rendered="true">
                                            </div>
                                        @endforeach
                                    </div>

                                    <a class="carousel-control-prev" href="#carousel-controls" role="button"
                                        data-bs-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="carousel-control-next" href="#carousel-controls" role="button"
                                        data-bs-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </div>


                                <div class="card-body">
                                    <div class="d-md-flex">
                                        <a href="javascript:void(0);" class="d-flex me-4 mb-2"><i
                                                class="fe fe-map fs-16 me-1 p-3 bg-secondary-transparent text-success bradius"></i>
                                            <div class="mt-3 ms-1 text-muted font-weight-semibold">
                                                {{ Illuminate\Support\Str::limit($beritadetail->lokasi, 20) }}</div>
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
                                        <a href="{{ route('pengunjung.news.like', ['id' => $beritadetail->id]) }}" class="d-flex me-4 mb-2">
                                            <i class="fe fe-heart fs-16 me-1 p-3 bg-secondary-transparent text-success bradius"></i>
                                            <div class="mt-3 ms-1 text-muted font-weight-semibold">Like {{ $beritadetail->jumlah_suka }} </div>
                                        </a>
                                        <!-- HTML -->
                                        <form id="likeForm"
                                            action="{{ route('pengunjung.news.like', ['id' => $beritadetail->id]) }}"
                                            method="POST">
                                            @csrf
                                            <button type="submit" class="d-flex me-4 mb-2" id="likeButton"
                                                style="border: none; background: none;">
                                                <i
                                                    class="fe fe-heart fs-16 me-1 p-3 bg-secondary-transparent text-success bradius"></i>
                                                <div class="mt-3 ms-1 text-muted font-weight-semibold">Like
                                                    {{ $beritadetail->jumlah_suka }}</div>
                                            </button>
                                        </form>
                                        <a href="javascript:void(0);" class="d-flex me-4 mb-2"><i
                                                class="fe fe-award fs-16 me-1 p-3 bg-secondary-transparent text-success bradius"></i>
                                            <div class="mt-3 ms-1 text-muted font-weight-semibold">Rating:
                                                {{ number_format($averageRating, 2) }} </div>
                                        </a>
                                        <div class="ms-auto">
                                            <a href="javascript:void(0);" class="d-flex me-4 mb-2"><i
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

                                <div class="card-footer"></div>

                            </div>
                        </div>

                        POSTINGAN YANG SERUPA 
                        <div class="col-12 col-lg-3">

                            <div class="card">
                                <div class="card-header">
                                    <div class="card-title">Postingan Lainya</div>
                                </div>
                                @foreach ($postinganLainnya as $postingan)
                                    <div class="card-body pb-2">
                                        <div class="">
                                            <div class="d-flex overflow-visible">
                                                <a href="{{ route('pengunjung.news.show', $postingan->id) }}"
                                                    class="card-aside-column br-5 cover-image"
                                                    data-bs-image-src="{{ asset('storage/uploads/' . $postingan->sampul) }}"
                                                    style="background: url(&quot;{{ asset('storage/uploads/' . $postingan->sampul) }}&quot;) center center;"></a>
                                                <div class="ps-3 flex-column">
                                                    <h5><a
                                                            href="{{ route('pengunjung.news.show', $postingan->id) }}">{{ $postingan->judul_postingan }}.</a>
                                                    </h5>
                                                    <div class="text-muted">{{ $postingan->judul_postingan }}.
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>


                        </div>

                        LIST KOMENTAR 
                        <div class="col-12 col-lg-6">

                            <div class="card-header">
                                <div class="card-title">Komentar</div>
                            </div>

                            @foreach ($beritadetail->komentars as $komentar)
                                <div class="media overflow-visible d-block d-sm-flex mt-5">
                                    <div class="me-3 mb-2">
                                    </div>
                                    <div class="media-body overflow-visible">
                                        <div class="border mb-5 p-4 br-5">
                                            <nav class="nav float-end">
                                                <div class="dropdown">
                                                    <a class="nav-link text-muted fs-16 p-0 ps-4" href="javascript:;"
                                                        data-bs-toggle="dropdown" role="button" aria-haspopup="true"
                                                        aria-expanded="false"><i class="fe fe-more-vertical"></i></a>
                                                    <div class="dropdown-menu dropdown-menu-end" style="">
                                                        <a class="dropdown-item" href="javascript:void(0)"><i
                                                                class="fe fe-flag mx-1"></i> Laporkan</a>
                                                        @if (Auth::check() && Auth::user()->role === 'super_admin')
                                                            <a class="dropdown-item"
                                                                href="{{ route('pengunjung.news.komentar.hapus', ['komentarId' => $komentar->id]) }}"
                                                                onclick="event.preventDefault(); document.getElementById('delete-komentar-{{ $komentar->id }}').submit();">
                                                                <i class="fe fe-trash-2 mx-1"></i> Delete
                                                            </a>
                                                            <form id="delete-komentar-{{ $komentar->id }}"
                                                                action="{{ route('pengunjung.news.komentar.hapus', ['komentarId' => $komentar->id]) }}"
                                                                method="POST" style="display: none;">
                                                                @csrf
                                                            </form>
                                                        @endif
                                                    </div>
                                                </div>
                                            </nav>
                                            <h5 class="mt-0">{{ $komentar->nama }}</h5>
                                            <span><i class="fe fe-thumb-up text-danger"></i></span>
                                            <p class="font-13 text-muted">{{ $komentar->isi_komentar }}.</p>

                                            <div class="d-flex">

                                                <form id="likeForm" method="POST"
                                                    action="{{ route('komentar.like', ['id' => $komentar->id]) }}">
                                                    @csrf
                                                    <button type="submit" class="like tai">
                                                        <span class="badge btn-danger-light rounded-pill py-2 px-3"
                                                            id="likeKomentarButton">
                                                            <i class="fe fe-heart me-1"></i>
                                                            {{ $komentar->jumlah_suka }}
                                                        </span>
                                                    </button>
                                                </form>

                                                <span class="reply me-4" style="margin-left: 1% !important"
                                                    data-commentid="{{ $komentar->id }}">
                                                    <div class="reply-button">
                                                        <span
                                                            class="reply-badge badge btn-succes bg-success rounded-pill py-2 px-2">
                                                            <i class="fe fe-corner-up-left mx-1"></i>Reply
                                                        </span>
                                                    </div>
                                                </span>

                                            </div>

                                            <form method="POST" style="display: none;" class="comment-form mt-4"
                                                data-commentid="{{ $komentar->id }}"
                                                action="{{ route('pengunjung.news.tambah-balasan-komentar', ['beritadetail' => $beritadetail->id, 'komentarId' => $komentar->id]) }}">
                                                @csrf
                                                <div class="form-group">
                                                    <input type="hidden" name="centang_biru"
                                                        value="{{ Auth::check() ? 1 : 0 }}">
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
                                                    <input type="text" class="form-control mb-2" id="nama"
                                                        name="nama" placeholder="Nama lengkap" required
                                                        value="{{ $namaValue }}" {{ $readonly }}>
                                                    <label for="isi_balasan">Balasan Komentar</label>
                                                    <textarea name="isi_balasan" class="form-control @error('isi_balasan') is-invalid @enderror" rows="3">{{ old('isi_balasan') }}</textarea>
                                                    @error('isi_balasan')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <button type="submit" class="btn btn-sm btn-primary">Balas</button>
                                            </form>
                                        </div>

                                        @foreach ($komentar->balasanKomentars as $balasan)
                                            @if ($balasan->parent_komentar_id === $komentar->id)
                                                <div class="media mb-5 overflow-visible">
                                                    <div class="me-5">
                                                    </div>
                                                    <div class="media-body border p-4 overflow-visible br-5">
                                                        <nav class="nav float-end">
                                                            <div class="dropdown">
                                                                <a class="nav-link text-muted fs-16 p-0 ps-4"
                                                                    href="javascript:;" data-bs-toggle="dropdown"
                                                                    role="button" aria-haspopup="true"
                                                                    aria-expanded="false"><i
                                                                        class="fe fe-more-vertical"></i></a>
                                                                <div class="dropdown-menu dropdown-menu-end"
                                                                    style="">
                                                                    <a class="dropdown-item" href="javascript:void(0)"><i
                                                                            class="fe fe-flag mx-1"></i> Report
                                                                        Abuse</a>
                                                                    @if (Auth::check() && Auth::user()->role === 'super_admin')
                                                                        <a class="dropdown-item"
                                                                            href="{{ route('pengunjung.news.komentar.balasan.hapus', ['komentarId' => $balasan->id]) }}"
                                                                            onclick="event.preventDefault(); document.getElementById('delete-balasan-komentar-{{ $balasan->id }}').submit();">
                                                                            <i class="fe fe-trash-2 mx-1"></i> Delete
                                                                        </a>
                                                                        <form
                                                                            id="delete-balasan-komentar-{{ $balasan->id }}"
                                                                            action="{{ route('pengunjung.news.komentar.balasan.hapus', ['komentarId' => $balasan->id]) }}"
                                                                            method="POST" style="display: none;">
                                                                            @csrf
                                                                        </form>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </nav>
                                                        <h5 class="mt-0">
                                                            @if ($balasan->centang_biru)
                                                                <a class="social-icon text-success"
                                                                    href="javascript:void(0)"><i
                                                                        class="fe fe-check-circle"></i></a>
                                                            @endif
                                                            @php
                                                                $namaBalasan = $balasan->nama;
                                                                $namaBalasan = str_replace('(Anggota Pengurus)', '<small>(anggota pengurus)</small>', $namaBalasan);
                                                            @endphp
                                                            {!! $namaBalasan !!}
                                                        </h5>
                                                        <span><i class="fe fe-thumb-up text-danger"></i></span>
                                                        <p class="font-13 text-muted">{{ $balasan->isi_balasan }}.</p>



                                                        <form id="likeBalasanKomentarForm" style="" method="POST"
                                                            action="{{ route('balasan_komentar.like', ['id' => $balasan->id]) }}">
                                                            @csrf
                                                            <button type="submit" class="like tai">
                                                                <span class="badge btn-danger-light rounded-pill py-2 px-3"
                                                                    id="likeBalasanKomentarButton">
                                                                    <i class="fe fe-heart me-1"></i>
                                                                    {{ $balasan->jumlah_suka }}
                                                                </span>
                                                            </button>
                                                        </form>
                                                    </div>
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                            @endforeach

                        </div>

                        <div class="col-12 col-lg-6">
                            <div class="card-header">
                                <div class="card-title">Tambahkan Komentar</div>
                            </div>
                            <div class="card-body">
                                <form class="form-horizontal m-t-20" method="post"
                                    action="{{ route('pengunjung.news.komentar.tambah', ['id' => $beritadetail->id]) }}">
                                    @csrf
                                    <input type="hidden" name="postingan_id" value="{{ $beritadetail->id }}">
                                    <div class="form-group">
                                        <div class="col-xs-12">
                                            <input class="form-control" id="nama" name="nama"
                                                value="{{ old('nama') }}" type="text" required=""
                                                placeholder="Username*">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-xs-12">
                                            <textarea class="form-control" placeholder="isi komentar" id="isi_komentar" name="isi_komentar">{{ old('isi_komentar') }}</textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-xs-12">
                                            <small>Rating</small>
                                            <div class="rating-stars block" id="rating-1" style="cursor: pointer;">
                                                <input type="hidden" id="rating-input" name="rating" required
                                                    value="{{ old('rating') }}" min="1">
                                                <i class="fa fa-star" data-value="1"
                                                    style="color: rgb(236, 240, 241);"></i>
                                                <i class="fa fa-star" data-value="2"
                                                    style="color: rgb(236, 240, 241);"></i>
                                                <i class="fa fa-star" data-value="3"
                                                    style="color: rgb(236, 240, 241);"></i>
                                                <i class="fa fa-star" data-value="4"
                                                    style="color: rgb(236, 240, 241);"></i>
                                                <i class="fa fa-star" data-value="5"
                                                    style="color: rgb(236, 240, 241);"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <button type="submit"
                                            class="btn btn-primary btn-rounded  waves-effect waves-light">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    @if (isset($komentar) && isset($balasan))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const likeBalasanKomentarButtons = document.querySelectorAll('.likeBalasanKomentarButton');
                likeBalasanKomentarButtons.forEach(likeBalasanKomentarButton => {
                    likeBalasanKomentarButton.addEventListener('click', function(event) {
                        event.preventDefault();
                        const likeBalasanKomentarIcon = likeBalasanKomentarButton.querySelector('i');
                        const balasanId = likeBalasanKomentarButton.getAttribute('data-balasan-id');
                        const balasanKomentarRoute = @json(route('balasan_komentar.like', ['id' => ':balasanId']));
                        const requestRoute = balasanKomentarRoute.replace(':balasanId', balasanId);

                        fetch(requestRoute, {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/json',
                                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                                },
                            })
                            .then(response => {
                                if (response.ok) {
                                    likeBalasanKomentarIcon.classList.add('text-danger');
                                    localStorage.setItem(`likedBalasanKomentar${balasanId}`,
                                    'true');
                                    setTimeout(() => {
                                        location.reload();
                                    }, 1000);
                                }
                            })
                            .catch(error => {
                                console.error('Error:', error);
                            });

                        const liked = localStorage.getItem(`likedBalasanKomentar${balasanId}`);
                        if (liked) {
                            likeBalasanKomentarIcon.classList.add('text-danger');
                        }
                    });
                });
            });
        </script>
    @endif

    @if (isset($komentar) && isset($balasan))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const likeKomentarButtons = document.querySelectorAll('.likeKomentarButton');
                likeKomentarButtons.forEach(likeKomentarButton => {
                    likeKomentarButton.addEventListener('click', function(event) {
                        event.preventDefault();
                        const likeKomentarIcon = likeKomentarButton.querySelector('i');
                        const komentarId = likeKomentarButton.getAttribute('data-komentar-id');
                        const komentarRoute = @json(route('komentar.like', ['id' => ':komentarId']));
                        const requestRoute = komentarRoute.replace(':komentarId', komentarId);

                        fetch(requestRoute, {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/json',
                                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                                },
                            })
                            .then(response => {
                                if (response.ok) {
                                    likeKomentarIcon.classList.add('text-danger');
                                    localStorage.setItem(`likedKomentar${komentarId}`, 'true');
                                }
                                setTimeout(() => {
                                    location.reload();
                                }, 1000);
                            })
                            .catch(error => {
                                console.error('Error:', error);
                            });

                        const liked = localStorage.getItem(`likedKomentar${komentarId}`);
                        if (liked) {
                            likeKomentarIcon.classList.add('text-danger');
                        }
                    });
                });
            });
        </script>
    @endif

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const likeButton = document.getElementById('likeButton');
            const likeIcon = likeButton.querySelector('i');
            const postId = '{{ $beritadetail->id }}';

            likeButton.addEventListener('click', function(event) {
                event.preventDefault();

                const liked = localStorage.getItem('liked');

                if (!liked) {
                    fetch(`/pengunjung/news/${postId}/like`, {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            },
                        })
                        .then(response => {
                            if (response.ok) {
                                likeIcon.classList.add(
                                    'text-danger');
                                localStorage.setItem('liked',
                                    'true');

                                setTimeout(() => {
                                    location.reload();
                                }, 1000);
                            }
                        })
                        .catch(error => {
                            console.error('Error:', error);
                        });
                }
            });

            const liked = localStorage.getItem('liked');
            if (liked) {
                likeIcon.classList.add('text-danger');
            }
        });
    </script>

    <script>
        $(document).ready(function() {
            $('.rating-stars i').click(function() {
                var value = $(this).data('value');
                $('#rating-input').val(value);
                $('.rating-stars i').css('color', 'rgb(236, 240, 241)');
                $(this).prevAll().addBack().css('color', '#f1c40f');
            });
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const lihatKomentarButtons = document.querySelectorAll('.lihat-komentar-btn');

            lihatKomentarButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const commentId = button.getAttribute('data-commentid');
                    const targetElem = document.querySelector(
                        `.balasan-komentar[data-commentid="${commentId}"]`);

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
        document.addEventListener('DOMContentLoaded', function() {
            const lihatKomentarButtons = document.querySelectorAll('.lihat-komentar-btn');

            lihatKomentarButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const commentId = button.getAttribute('data-commentid');
                    const targetElem = document.querySelector(
                        `.balasan-komentar[data-commentid="${commentId}"]`);

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
        document.addEventListener('DOMContentLoaded', function() {
            const replyButtons = document.querySelectorAll('.reply-badge');
            const commentForms = document.querySelectorAll('.comment-form');

            replyButtons.forEach(button => {
                button.addEventListener('click', () => {
                    const commentId = button.closest('.reply').getAttribute('data-commentid');
                    const form = document.querySelector(
                        `.comment-form[data-commentid="${commentId}"]`);

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
@endsection --}}


@extends('layouts.pengunjung.main')

@section('container')
    
<main class="main-content w-full px-[var(--margin-x)]">
            <div class="grid grid-cols-12 lg:gap-6">
                
                <div class="col-span-12 pt-6 lg:col-span-8 lg:pb-6">
                    <div class="card p-4 lg:p-6">
                        <!-- Author -->
                        <div>
                            <div class="flex items-center justify-between">
                                <div class="flex items-center space-x-3">
                                    <div x-data="usePopper({
                                       offset: 12,
                                       placement: 'bottom',
                                       modifiers: [
                                          {name: 'preventOverflow', options: {padding: 10}}
                                       ]                     
                                    })" class="flex" @mouseleave="isShowPopper = false" @mouseenter="isShowPopper = true">
                                        <div x-ref="popperRef" class="avatar h-12 w-12">
                                            <img class="mask is-squircle" src="{{ asset('assets/images/brand/logo-2.png') }}" alt="avatar" />
                                        </div>
                                        <div x-ref="popperRoot" class="popper-root" :class="isShowPopper && 'show'">
                                            <div class="popper-box">
                                                <div
                                                    class="flex w-48 flex-col items-center rounded-md border border-slate-150 bg-white p-3 text-center dark:border-navy-600 dark:bg-navy-700">
                                                    <div class="avatar h-16 w-16">
                                                        <img class="rounded-full" src="{{ asset('assets/images/brand/logo-2.png') }}" alt="avatar" />
                                                    </div>
                                                    <p class="mt-2 font-medium tracking-wide text-slate-700 dark:text-navy-100">
                                                        {{ $beritadetail->sumber }}
                                                    </p>
                                                </div>
                                                <div class="h-4 w-4" data-popper-arrow>
                                                    <svg viewBox="0 0 16 9" xmlns="../www.w3.org/2000/svg.html" class="absolute h-4 w-4"
                                                        fill="currentColor">
                                                        <path class="text-slate-150 dark:text-navy-600"
                                                            d="M1.5 8.357s-.48.624 2.754-4.779C5.583 1.35 6.796.01 8 0c1.204-.009 2.417 1.33 3.76 3.578 3.253 5.43 2.74 4.78 2.74 4.78h-13z" />
                                                        <path class="text-white dark:text-navy-700"
                                                            d="M0 9s1.796-.017 4.67-4.648C5.853 2.442 6.93 1.293 8 1.286c1.07-.008 2.147 1.14 3.343 3.066C14.233 9.006 15.999 9 15.999 9H0z" />
                                                    </svg>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <a href="#"
                                            class="font-medium text-slate-700 line-clamp-1 hover:text-primary focus:text-primary dark:text-navy-100 dark:hover:text-accent-light dark:focus:text-accent-light">
                                            {{ $beritadetail->sumber }}
                                        </a>
                                        <div class="mt-1.5 flex items-center text-xs">
                                            <span class="line-clamp-1"> Diunggah Pada {{ $beritadetail->created_at->format('d F Y') }} {{ $beritadetail->created_at->format('H:i') }}</span>
                                        </div>
                                    </div>
                                </div>
                
                                <div class="flex space-x-3">
                                    <div class="hidden sm:flex">
                                        <button x-data="{ isLiked: false }" @click="isLiked = !isLiked; likePostingan({{ $beritadetail->id }})"
                                            class="btn h-9 w-9 bg-slate-150 p-0 text-slate-800 hover:bg-slate-200 focus:bg-slate-200 active:bg-slate-200/80 dark:bg-navy-500 dark:text-navy-50 dark:hover:bg-navy-450 dark:focus:bg-navy-450 dark:active:bg-navy-450/90">
                                            <i x-show="!isLiked" class="fa-regular fa-heart text-lg"></i>
                                            <i x-show="isLiked" class="fa-solid fa-heart text-lg text-error" style="display: none;"></i>
                                        </button>
                                        <button
                                            class="btn h-8 w-8 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                                            <svg xmlns="../www.w3.org/2000/svg.html" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                                                stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z"></path>
                                            </svg>
                                        </button>
                                        <button
                                            class="btn h-8 w-8 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                                            <i class="fab fa-twitter text-base"></i>
                                        </button>
                                        <button
                                            class="btn h-8 w-8 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                                            <i class="fab fa-linkedin text-base"></i>
                                        </button>
                                        <button
                                            class="btn h-8 w-8 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                                            <i class="fab fa-instagram text-base"></i>
                                        </button>
                                        <button
                                            class="btn h-8 w-8 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                                            <i class="fab fa-facebook text-base"></i>
                                        </button>
                                    </div>

                                </div>
                            </div>
                            <div class="mt-6 flex items-center space-x-3 sm:hidden">
                               
                                <div class="flex">
                                    <button
                                        class="btn h-8 w-8 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                                        <i class="fab fa-twitter text-base"></i>
                                    </button>
                                    <button
                                        class="btn h-8 w-8 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                                        <i class="fab fa-linkedin text-base"></i>
                                    </button>
                                    <button
                                        class="btn h-8 w-8 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                                        <i class="fab fa-instagram text-base"></i>
                                    </button>
                                    <button
                                        class="btn h-8 w-8 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                                        <i class="fab fa-facebook text-base"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                
                        <!-- Blog Post -->
                        <div class="mt-6 font-inter text-base text-slate-600 dark:text-navy-200">
                            <h1 class="text-xl font-medium text-slate-900 dark:text-navy-50 lg:text-2xl">
                                {{ $beritadetail->judul_postingan }}.
                            </h1>
                            <div x-init="$nextTick(()=>$el._x_swiper = new Swiper($el, {scrollbar: {el: '.swiper-scrollbar',draggable: true}, navigation: {prevEl: '.swiper-button-prev',nextEl: '.swiper-button-next'},autoplay: {delay: 2000}}))"
                                class="swiper rounded-lg mt-5">
                                <div class="swiper-wrapper">
                                    @foreach (explode(',', $beritadetail->gambar_pendukung) as $image)
                                    <div class="swiper-slide">
                                        <img class="h-full w-full object-cover" src="{{ asset('storage/uploads/' . $image) }}" alt="" />
                                    </div>
                                    @endforeach
                                </div>
                                <div class="swiper-scrollbar"></div>
                                <div class="swiper-button-next"></div>
                                <div class="swiper-button-prev"></div>
                            </div>
                            <p class="mt-1 text-center text-xs+ text-slate-400 dark:text-navy-300">
                                <a href="#" class="underline">
                                <span> Photo by </span>{{ $beritadetail->sumber }}</a>
                            </p>
                            <br />
                            <p>{{ $beritadetail->deskripsi }}
                        </div>
                
                        <!-- Footer Blog Post -->
                        <div class="mt-5 hidden md:flex lg:flex space-x-3">
                            <button class="btn px-4 h-8 bg-primary/10 p-0 text-primary hover:bg-primary/20 focus:bg-primary/20 active:bg-primary/25 dark:bg-accent-light/10 dark:text-accent-light dark:hover:bg-accent-light/20 dark:focus:bg-accent-light/20 dark:active:bg-accent-light/25">
                                <svg xmlns="../www.w3.org/2000/svg.html" class="h-4.5 w-4.5" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                        d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z">
                                    </path>
                                </svg>
                                <span class="px-2">{{ $beritadetail->komentars_count }} Komentar</span>
                            </button>
                
                            <button
                                class="btn px-4 h-8 bg-primary/10 p-0 text-primary hover:bg-primary/20 focus:bg-primary/20 active:bg-primary/25 dark:bg-accent-light/10 dark:text-accent-light dark:hover:bg-accent-light/20 dark:focus:bg-accent-light/20 dark:active:bg-accent-light/25">
                                <svg xmlns="http://www.w3.org/2000/svg" stroke-width="1.5" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z">
                                    </path>
                                </svg>
                                <span class="px-2">Rating:
                                {{ number_format($averageRating, 2) }}</span>
                            </button>
                
                            <button
                                class="btn px-4 h-8 bg-primary/10 p-0 text-primary hover:bg-primary/20 focus:bg-primary/20 active:bg-primary/25 dark:bg-accent-light/10 dark:text-accent-light dark:hover:bg-accent-light/20 dark:focus:bg-accent-light/20 dark:active:bg-accent-light/25">
                                <i class="fa-regular fa-heart"></i>
                                <span class="px-2">Like <span id="like-count">{{ $beritadetail->jumlah_suka }}</span>
                                <span>
                            </button>
                
                        </div>
                    </div>
                
                    <div class="mt-5">
                        <div class="flex items-center justify-between">
                            <p class="text-lg font-medium text-slate-800 dark:text-navy-100">
                                Recent Articles
                            </p>
                            <a href="#"
                                class="border-b border-dotted border-current pb-0.5 text-xs+ font-medium text-primary outline-none transition-colors duration-300 hover:text-primary/70 focus:text-primary/70 dark:text-accent-light dark:hover:text-accent-light/70 dark:focus:text-accent-light/70">View
                                All</a>
                        </div>
                        <div class="mt-3 grid grid-cols-1 gap-4 sm:grid-cols-2 sm:gap-5 lg:grid-cols-1 lg:gap-6">
                            
                            @foreach ($postinganLainnya as $postingan)
                            <div class="card lg:flex-row">
                                <img class="h-48 w-full shrink-0 rounded-t-lg bg-cover bg-center object-cover object-center lg:h-auto lg:w-48 lg:rounded-t-none lg:rounded-l-lg"
                                    src="{{ asset('storage/uploads/' . $postingan->sampul) }}" alt="image" />
                                <div class="flex w-full grow flex-col px-4 py-3 sm:px-5">
                                    <div class="flex items-center justify-between">
                                        <a class="text-xs+ text-info" href="#">{{ $postingan->kategori }}</a>
                                        <div class="-mr-1.5 flex space-x-1">
                                            <button
                                                class="btn h-7 w-7 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                                                <svg xmlns="../www.w3.org/2000/svg.html" class="h-4.5 w-4.5" fill="none"
                                                    viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z" />
                                                </svg>
                                            </button>

                                        </div>
                                    </div>
                                    <div>
                                        <a href="#"
                                            class="text-lg font-medium text-slate-700 hover:text-primary focus:text-primary dark:text-navy-100 dark:hover:text-accent-light dark:focus:text-accent-light">
                                            {{ $postingan->judul_postingan }}</a>
                                    </div>
                                    <p class="mt-1 line-clamp-3">
                                        {{ $postingan->deskripsi }}</p>
                                   
                                    <div class="mt-1 flex justify-end">
                                        <a href="{{ route('pengunjung.news.show', $postingan->id) }}"
                                            class="btn px-2.5 py-1.5 font-medium text-primary hover:bg-primary/20 focus:bg-primary/20 active:bg-primary/25 dark:text-accent-light dark:hover:bg-accent-light/20 dark:focus:bg-accent-light/20 dark:active:bg-accent-light/25">
                                            READ ARTICLE
                                        </a>
                                    </div>
                                </div>
                            </div>
                            @endforeach

                            
                        </div>
                    </div>
                </div>

                <div class="col-span-12 py-6 lg:sticky lg:bottom-0 lg:col-span-4 lg:self-end">
        
                    <div class="card.">
                        <div>
                            <div class="flex items-center justify-between">
                                <h2 class="p-4 text-sm+ font-medium tracking-wide text-slate-700 dark:text-navy-100">
                                    List Komentar
                                </h2>
                            </div>
        
                            <div class="mt-3 space-y-3.5">
        
                                <!-- komentar -->
                                @foreach ($beritadetail->komentars as $komentar)
                                <div class="card p-4 mx-2">
                                    <div class="flex items-center space-x-3">
                                        <div class="flex-1">
                                            <div class="flex justify-between">
                                                
                                                <p class="font-medium text-slate-700 dark:text-navy-100">
                                                    {{ $komentar->nama }}
                                                </p>

                                                @if (Auth::check() && Auth::user()->role === 'super_admin')
                                                <div x-data="usePopper({placement:'bottom-end',offset:4})" @click.outside="isShowPopper && (isShowPopper = false)"
                                                    class="inline-flex">
                                                    <button x-ref="popperRef" @click="isShowPopper = !isShowPopper"
                                                        class="btn h-7 w-7 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                                                        <svg xmlns="../www.w3.org/2000/svg.html" class="h-4.5 w-4.5" fill="none" viewBox="0 0 24 24"
                                                            stroke="currentColor" stroke-width="2">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z" />
                                                        </svg>
                                                    </button>
                                                
                                                    <div x-ref="popperRoot" class="popper-root" :class="isShowPopper && 'show'">
                                                        <div
                                                            class="popper-box rounded-md border border-slate-150 bg-white py-1.5 font-inter dark:border-navy-500 dark:bg-navy-700">
                                                            <ul>
                                                                <li>
                                                                    <a href="{{ route('pengunjung.news.komentar.hapus', ['komentarId' => $komentar->id]) }}"
                                                                        class="flex text-xs h-8 bg-error/25 text-error items-center px-3  tracking-wide outline-none transition-all hover:bg-error/50 hover:bg-error/25 focus:bg-slate-100 focus:bg-error/25 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100" 
                                                                        onclick="event.preventDefault(); document.getElementById('delete-komentar-{{ $komentar->id }}').submit();">
                                                                        <i class="fa fa-trash-alt bg-error/25 pr-1"></i> Hapus Komentar</a>
                                                                    <form id="delete-komentar-{{ $komentar->id }}"
                                                                        action="{{ route('pengunjung.news.komentar.hapus', ['komentarId' => $komentar->id]) }}" method="POST"
                                                                        style="display: none;">
                                                                        @csrf
                                                                    </form>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                @endif

                                            </div>
                                            <div class="mt-0.5 flex text-slate-700 dark:text-navy-100 text-xs">
                                                <p class="justify py-2">{{ $komentar->isi_komentar }}</p>
                                            </div>
                                            <div class="mt-0.5 flex text-xs text-slate-400 dark:text-navy-300">
                                                <button class="h-7 px-2 w-fit btn bg-primary/10 p-0 text-primary hover:bg-primary/20 focus:bg-primary/20 active:bg-primary/25 dark:bg-accent-light/10 dark:text-accent-light dark:hover:bg-accent-light/20 dark:focus:bg-accent-light/20 dark:active:bg-accent-light/25 flex items-center">
                                                    {{ $komentar->timeElapsedString() }}
                                                 </button>
                                                <div class="mx-2 my-1 w-px bg-slate-200 dark:bg-navy-500 sm:flex"></div>
                                                <button
                                                    class="h-7 px-2 btn bg-primary/10 p-0 text-primary hover:bg-primary/20 focus:bg-primary/20 active:bg-primary/25 dark:bg-accent-light/10 dark:text-accent-light dark:hover:bg-accent-light/20 dark:focus:bg-accent-light/20 dark:active:bg-accent-light/25 ">
                                                    <div class="p flex mx-auto items-center justify-center">
                                                        @for ($i = 1; $i <= 5; $i++) @if ($i <=$komentar->rating)
                                                            <i class="fa fa-star" style="color: #f1c40f;"></i>
                                                            @else
                                                            <i class="fa fa-star" style="color: rgb(236, 240, 241);"></i>
                                                            @endif
                                                            @endfor
                                                    </div>
                                                </button>

                                                <div class="mx-2 my-1 w-px bg-slate-200 dark:bg-navy-500 sm:flex"></div>
                                                <button data-commentid="{{ $komentar->id }}"
                                                    class="reply-badge reply btn h-7 w-7 bg-primary/10 p-0 text-primary hover:bg-primary/20 focus:bg-primary/20 active:bg-primary/25 dark:bg-accent-light/10 dark:text-accent-light dark:hover:bg-accent-light/20 dark:focus:bg-accent-light/20 dark:active:bg-accent-light/25">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4.5 w-4.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                                            d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z">
                                                        </path>
                                                    </svg>
                                                </button>

                                            </div>
                                        </div>
        
                                    </div>
                                    
                                    <!-- Tambahkan Balasan Komentar -->
                                    <form method="POST" style="display: none;" class="comment-form mt-4 space-y-3.5 mx-4 pb-4"
                                        data-commentid="{{ $komentar->id }}"
                                        action="{{ route('pengunjung.news.tambah-balasan-komentar', ['beritadetail' => $beritadetail->id, 'komentarId' => $komentar->id]) }}">
                                        @csrf
                                        <div class="flex items-center justify-between">
                                            <h2
                                                class="p-4 text-xs+ text-center font-normal tracking-wide text-slate-700 dark:text-navy-100 border-b w-full border-slate-200 pt-4  dark:border-navy-600 dark:text-navy-100">
                                                Tambahkan Balasan Komentar
                                            </h2>
                                        </div>


                                        <input type="hidden" name="centang_biru" value="{{ Auth::check() ? 1 : 0 }}">
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

                                        <label class="block text-xs">
                                            <span>Nama Lengkap:</span>
                                            <input name="nama"
                                                class="text-xs form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                                placeholder="Username" type="text" value="{{ $namaValue }}" {{ $readonly }} required  />
                                        </label>
        
                                        <label class="block">
                                            <textarea rows="4" placeholder=" Masukkan Komentar Dan Saran" name="isi_balasan"
                                                class=" @error('isi_balasan') is-invalid @enderror text-xs form-textarea w-full resize-none rounded-lg border border-slate-300 bg-transparent p-2.5 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent">{{ old('isi_balasan') }}</textarea>
                                                @error('isi_balasan')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </label>
        
                                        <div class="flex justify-end">
                                            <button type="submit"
                                                class="text-xs h-10 px-4 w-fit btn bg-primary/10 p-0 text-primary hover:bg-primary/20 focus:bg-primary/20 active:bg-primary/25 dark:bg-accent-light/10 dark:text-accent-light dark:hover:bg-accent-light/20 dark:focus:bg-accent-light/20 dark:active:bg-accent-light/25 flex items-center">
                                                Kirim
                                            </button>
                                        </div>
                                    </form>
                                    
                                   
        
                                    <!-- End Tambahkan Balasan Komentar -->
        
                                    <!-- balasan komentar -->
                                    @foreach ($komentar->balasanKomentars as $balasan)
                                    @if ($balasan->parent_komentar_id === $komentar->id)
                                    <div class="ml-4 pl-4 flex items-center mt-4 space-x-3  xx  border-t border-slate-200 pt-4 text-slate-800 dark:border-navy-600 dark:text-navy-100">
                                        <div class="flex-1">
                                            <div class="flex items-center justify-between">

                                                <div class="flex font-medium text-slate-700 dark:text-navy-100">
                                                        @if ($balasan->centang_biru)
                                                            <div class="mask is-star mr-1 flex h-5 w-5 shrink-0 items-center justify-center bg-info">
                                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="white">
                                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                                                </svg>
                                                            </div>
                                                        @endif
                                                        @php
                                                        $namaBalasan = $balasan->nama;
                                                        $namaBalasan = str_replace('(Anggota Pengurus)', '<small class="font-medium">(anggota pengurus)</small>', $namaBalasan);
                                                        @endphp
                                                        <div class="font-medium">{!! $namaBalasan !!}</div>
                                                </div>

                                                @if (Auth::check() && Auth::user()->role === 'super_admin')
                                                <div x-data="usePopper({placement:'bottom-end',offset:4})"
                                                    @click.outside="isShowPopper && (isShowPopper = false)"
                                                    class="inline-flex">
                                                    <button x-ref="popperRef" @click="isShowPopper = !isShowPopper"
                                                        class="btn h-7 w-7 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                                                        <svg xmlns="../www.w3.org/2000/svg.html" class="h-4.5 w-4.5"
                                                            fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                                            stroke-width="2">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z" />
                                                        </svg>
                                                    </button>

                                                    <div x-ref="popperRoot" class="popper-root"
                                                        :class="isShowPopper && 'show'">
                                                        <div
                                                            class="popper-box rounded-md border border-slate-150 bg-white py-1.5 font-inter dark:border-navy-500 dark:bg-navy-700">
                                                            <ul>
                                                                <li>
                                                                    <a href="{{ route('pengunjung.news.komentar.balasan.hapus', ['komentarId' => $balasan->id]) }}"
                                                                        class="flex text-xs h-8 bg-error/25 text-error items-center px-3  tracking-wide outline-none transition-all hover:bg-error/50 hover:bg-error/25 focus:bg-slate-100 focus:bg-error/25 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100"
                                                                        onclick="event.preventDefault(); document.getElementById('delete-balasan-komentar-{{ $balasan->id }}').submit();">
                                                                        <i class="fa fa-trash-alt bg-error/25 pr-2"></i> Hapus Balasan Komentar</a>
                                                                    <form
                                                                        id="delete-balasan-komentar-{{ $balasan->id }}"
                                                                        action="{{ route('pengunjung.news.komentar.balasan.hapus', ['komentarId' => $balasan->id]) }}"
                                                                        method="POST" style="display: none;">
                                                                        @csrf
                                                                    </form>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                @endif

                                            </div>
                                            <div class="mt-0.5 flex text-slate-700 dark:text-navy-100 text-xs">
                                                <p class="justify py-2">{{ $balasan->isi_balasan }}</p>
                                            </div>
                                            <div class="mt-0.5 flex text-xs text-slate-400 dark:text-navy-300">
                                                <button
                                                    class="h-7 px-2 w-fit btn bg-primary/10 p-0 text-primary hover:bg-primary/20 focus:bg-primary/20 active:bg-primary/25 dark:bg-accent-light/10 dark:text-accent-light dark:hover:bg-accent-light/20 dark:focus:bg-accent-light/20 dark:active:bg-accent-light/25 flex items-center">
                                                    {{ $komentar->created_at->format('H:i') }} Pada {{ $balasan->created_at->format('d F Y') }}
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                    @endforeach
                                    <!-- end balasan komentar -->
                                </div>
                                @endforeach
                                <!-- end komentar -->
        
                                <br>
                            </div>
        
                        </div>
        
        
                    </div>
        
                    <div class="card mt-4">
        
                        <div>
                            <div class="flex items-center justify-between">
                                <h2
                                    class="p-4 text-sm+ font-medium tracking-wide text-slate-700 dark:text-navy-100 border-b w-full border-slate-200 pt-4  dark:border-navy-600 dark:text-navy-100">
                                    Tambahkan Komentar
                                </h2>
                            </div>
        
                            
                             <form class="mt-3 space-y-3.5 px-4 mx-4 pb-4" method="post"
                                action="{{ route('pengunjung.news.komentar.tambah', ['id' => $beritadetail->id]) }}">
                                @csrf       
                                    <input type="hidden" name="postingan_id" value="{{ $beritadetail->id }}">
                                <label class="block">
                                    <span>Nama Lengkap:</span>
                                    <input
                                        class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                       name="nama" value="{{ old('nama') }}" type="text" required placeholder="Username*">
                                </label>
        
                                <label class="block">
                                    <textarea rows="4" placeholder=" Masukkan Komentar Dan Saran" 
                                        class="form-textarea w-full resize-none rounded-lg border border-slate-300 bg-transparent p-2.5 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                         name="isi_komentar">{{ old('isi_komentar') }}</textarea></textarea>
                                </label>

                                <div class="form-group">
                                    <div class="col-xs-12">
                                        <small>Rating</small>
                                        <div class="rating-stars block" id="rating-1" style="cursor: pointer;">
                                            <input type="hidden" id="rating-input" name="rating" required value="{{ old('rating') }}" min="1">
                                            <i class="fa fa-star" data-value="1" style="color: rgb(236, 240, 241);"></i>
                                            <i class="fa fa-star" data-value="2" style="color: rgb(236, 240, 241);"></i>
                                            <i class="fa fa-star" data-value="3" style="color: rgb(236, 240, 241);"></i>
                                            <i class="fa fa-star" data-value="4" style="color: rgb(236, 240, 241);"></i>
                                            <i class="fa fa-star" data-value="5" style="color: rgb(236, 240, 241);"></i>
                                        </div>
                                    </div>
                                </div>
        
                                <div class="flex justify-end">
                                    <button type="submit"
                                        class="h-10 px-4 w-fit btn bg-primary/10 p-0 text-primary hover:bg-primary/20 focus:bg-primary/20 active:bg-primary/25 dark:bg-accent-light/10 dark:text-accent-light dark:hover:bg-accent-light/20 dark:focus:bg-accent-light/20 dark:active:bg-accent-light/25 flex items-center">
                                        Kirim
                                    </button>
                                </div>
                            </form>
        
                        </div>
        
                    </div>


                </div>
            </div>
            @include('layouts.pengunjung.footer')
            

                <style>
                    .rating-stars i {
                        font-size: 24px;
                        /* Adjust the font size as needed */
                    }
                </style>
        </main>

    
@endsection


<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    $(document).ready(function() {
            $('.rating-stars i').click(function() {
                var value = $(this).data('value');
                $('#rating-input').val(value);
                $('.rating-stars i').css('color', 'rgb(236, 240, 241)');
                $(this).prevAll().addBack().css('color', '#f1c40f');
            });
        });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
            // Inisialisasi variabel untuk menyimpan formulir yang sedang ditampilkan
            let activeForm = null;

            // Ambil semua tombol dengan class "reply-badge"
            const replyButtons = document.querySelectorAll('.reply-badge');

            // Tambahkan event listener untuk setiap tombol
            replyButtons.forEach(button => {
                button.addEventListener('click', function (event) {
                    // Hentikan event klik agar tidak menutup formulir segera
                    event.stopPropagation();

                    // Ambil id komentar dari atribut data-commentid
                    const commentId = button.getAttribute('data-commentid');

                    // Cari form dengan id yang sesuai
                    const commentForm = document.querySelector(`.comment-form[data-commentid="${commentId}"]`);

                    // Sembunyikan formulir yang sedang ditampilkan jika ada
                    if (activeForm && activeForm !== commentForm) {
                        activeForm.style.display = 'none';
                    }

                    // Toggle tampilan form (tampilkan jika tersembunyi, sebaliknya)
                    if (commentForm.style.display === 'none' || commentForm.style.display === '') {
                        commentForm.style.display = 'block';
                        // Set formulir yang sedang ditampilkan ke formulir saat ini
                        activeForm = commentForm;
                    } else {
                        commentForm.style.display = 'none';
                        // Reset formulir yang sedang ditampilkan
                        activeForm = null;
                    }
                });
            });

            // Tambahkan event listener untuk menutup formulir jika klik di luar formulir
            document.addEventListener('click', function (event) {
                // Cek apakah yang diklik bukanlah anak dari formulir yang sedang ditampilkan
                if (activeForm && !activeForm.contains(event.target)) {
                    activeForm.style.display = 'none';
                    activeForm = null;
                }
            });
        }); 
</script>
<!-- Jika menggunakan CDN -->

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script>
    function likePostingan(postId) {
        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        fetch(`/like-postingan/${postId}`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken,
                },
                body: JSON.stringify({
                    postId: postId
                }),
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Perbarui tampilan jumlah like tanpa perlu mereload halaman
                    const likeCountElement = document.getElementById(
                    'like-count'); // Gantilah 'like-count' dengan ID yang sesuai
                    likeCountElement.innerText = data
                    .newLikeCount; // 'newLikeCount' harus disesuaikan dengan respons server

                    // Tampilkan SweetAlert dengan pesan sukses
                    Swal.fire({
                        icon: 'success',
                        title: 'Like berhasil ditambahkan!',
                        showConfirmButton: false,
                        timer: 1500
                    });
                } else {
                    // Tampilkan SweetAlert dengan pesan error dari respons server
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: data.message,
                    });
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });
    }
</script>
