@extends('layouts.pengunjung.main')

@section('container')
    <div class="main-content">
        <div class="side-app">
            <div class="main-container container-fluid">

                <div class="container mt-4 pt-5">
                    <br>
                    <div class="row">

                        {{-- POSTINGAN DETAIL  --}}
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

                                        {{-- <a href="javascript:void(0);" class="d-flex me-4 mb-2"><i
                                                    class="fe fe-clock fs-16 me-1 p-3 bg-secondary-transparent text-success bradius"></i>
                                                <div class="mt-3 ms-1 text-muted font-weight-semibold">{{ $beritadetail->selisihWaktu }}
                                                </div>
                                            </a>
                                            <a href="javascript:void(0);" class="d-flex mb-2 me-4"><i
                                                    class="fe fe-camera fs-16 me-1 p-3 bg-secondary-transparent text-success bradius"></i>
                                                <div class="mt-3 ms-1 text-muted font-weight-semibold">{{ $beritadetail->sumber }}</div>
                                            </a> --}}

                                        <a href="javascript:void(0);" class="d-flex me-4 mb-2"><i
                                                class="fe fe-map fs-16 me-1 p-3 bg-secondary-transparent text-success bradius"></i>
                                            <div class="mt-3 ms-1 text-muted font-weight-semibold">{{ Illuminate\Support\Str::limit($beritadetail->lokasi, 20) }}</div>
                                        </a>
                                        <a href="javascript:void(0);" class="d-flex me-4 mb-2"><i
                                                class="fe fe-calendar fs-16 me-1 p-3 bg-secondary-transparent text-success bradius"></i>
                                            <div class="mt-3 ms-1 text-muted font-weight-semibold">
                                                {{ $beritadetail->created_at->format('d F Y') }}</div>
                                        </a>
                                        {{-- <a href="javascript:void(0);" class="d-flex me-4 mb-2"><i
                                                class="fe fe-heart fs-16 me-1 p-3 bg-secondary-transparent text-success bradius"></i>
                                            <div class="mt-3 ms-1 text-muted font-weight-semibold">Like
                                                {{ $beritadetail->jumlah_suka }} </div>
                                        </a> --}}
                                        {{-- <a href="{{ route('pengunjung.news.like', ['id' => $beritadetail->id]) }}" class="d-flex me-4 mb-2">
                                            <i class="fe fe-heart fs-16 me-1 p-3 bg-secondary-transparent text-success bradius"></i>
                                            <div class="mt-3 ms-1 text-muted font-weight-semibold">Like {{ $beritadetail->jumlah_suka }} </div>
                                        </a> --}}
                                        <!-- HTML -->
                                      <form id="likeForm" action="{{ route('pengunjung.news.like', ['id' => $beritadetail->id]) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="d-flex me-4 mb-2" id="likeButton" style="border: none; background: none;">
                                            <i class="fe fe-heart fs-16 me-1 p-3 bg-secondary-transparent text-success bradius"></i>
                                            <div class="mt-3 ms-1 text-muted font-weight-semibold">Like {{ $beritadetail->jumlah_suka }}</div>
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

                        {{-- POSTINGAN YANG SERUPA  --}}
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

                        {{-- LIST KOMENTAR  --}}
                        <div class="col-12 col-lg-6">

                            <div class="card-header">
                                <div class="card-title">Komentar</div>
                            </div>
                            
                            @foreach ($beritadetail->komentars as $komentar)
                                <div class="media overflow-visible d-block d-sm-flex mt-5">
                                    <div class="me-3 mb-2">
                                        {{-- <a href="#"> <img class="media-object rounded-circle thumb-sm" alt="64x64" src="{{ asset('assets/images/users/5.jpg') }}"> </a> --}}
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
                                                            <!-- Tombol Delete hanya ditampilkan untuk Super Admin -->
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

                                                <form id="likeForm" method="POST" action="{{ route('komentar.like', ['id' => $komentar->id]) }}">
                                                    @csrf
                                                    <button type="submit" class="like tai">
                                                        <span class="badge btn-danger-light rounded-pill py-2 px-3" id="likeKomentarButton">
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
                                                        {{-- <a href="#"> <img  class="media-object rounded-circle thumb-sm"  alt="64x64" src="{{ asset('assets/images/users/2.jpg') }}"> </a> --}}
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
                                                                        <!-- Tombol Delete hanya ditampilkan untuk Super Admin -->
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
                                                        
                                                        
  
                                                        <form id="likeBalasanKomentarForm" style="" method="POST" action="{{ route('balasan_komentar.like', ['id' => $balasan->id]) }}">
                                                            @csrf
                                                            <button type="submit" class="like tai">
                                                                <span class="badge btn-danger-light rounded-pill py-2 px-3" id="likeBalasanKomentarButton">
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

                        {{-- TAMBAH KOMENTAR  --}}
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
                                            <textarea class="form-control" placeholder="isi komentar"  id="isi_komentar" name="isi_komentar">{{ old('isi_komentar') }}</textarea>
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

@if(isset($komentar) && isset($balasan))
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const likeBalasanKomentarButtons = document.querySelectorAll('.likeBalasanKomentarButton');
        likeBalasanKomentarButtons.forEach(likeBalasanKomentarButton => {
            likeBalasanKomentarButton.addEventListener('click', function (event) {
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
                            localStorage.setItem(`likedBalasanKomentar${balasanId}`, 'true');
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

@if(isset($komentar) && isset($balasan))
<script>
   document.addEventListener('DOMContentLoaded', function () {
       const likeKomentarButtons = document.querySelectorAll('.likeKomentarButton');
       likeKomentarButtons.forEach(likeKomentarButton => {
           likeKomentarButton.addEventListener('click', function (event) {
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
@endsection
