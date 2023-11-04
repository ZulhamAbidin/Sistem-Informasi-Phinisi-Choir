@extends('layouts.pengunjung.main')

@section('container')

    <div class="main-content mt-0">
        <div class="side-app">
            <div class="main-container container-fluid">

                <div class="container mt-4 pt-5">
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
                            </style>

                            <div class="card">
                                <img class="card-img-top card-img-bottom "
                                    src="{{ asset('storage/uploads/' . $beritadetail->sampul) }}" alt="Card image cap">
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
                                            </a>
                                            --}}
                                        <a href="javascript:void(0);" class="d-flex me-4 mb-2"><i
                                                class="fe fe-map fs-16 me-1 p-3 bg-secondary-transparent text-success bradius"></i>
                                            <div class="mt-3 ms-1 text-muted font-weight-semibold">
                                                {{ $beritadetail->lokasi }}</div>
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
                                <div class="card-footer">
                                    <div class="email-attch">
                                        <p class="font-weight-semibold">Dokumentasi</p>
                                    </div>
                                    <div class="row attachments-doc">
                                        @if ($beritadetail->gambar_pendukung)
                                            @foreach (explode(',', $beritadetail->gambar_pendukung) as $image)
                                                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-4 mb-2 mb-sm-0">
                                                    <div class="border overflow-hidden p-0 br-7">
                                                        <a href=""><img
                                                                src="{{ asset('storage/uploads/' . $image) }}"
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

                        <div class="col-12 col-lg-3">

                            <div class="card">
                                <div class="card-header">
                                    <div class="card-title">Postingan Lainya</div>
                                </div>
                                <div class="card-body">
                                    <div class="">
                                        @foreach ($postinganLainnya as $postingan)
                                            <div class="d-flex overflow-visible">
                                                <a href="{{ route('pengunjung.news.show', $postingan->id) }}"
                                                    class="card-aside-column br-5 cover-image"
                                                    data-bs-image-src="{{ asset('storage/uploads/' . $postingan->sampul) }}"
                                                    style="background: url(&quot;{{ asset('storage/uploads/' . $postingan->sampul) }}&quot;) center center;"></a>
                                                <div class="ps-3 flex-column">
                                                    <h5><a
                                                            href="{{ route('pengunjung.news.show', $postingan->id) }}">{{ $postingan->judul_postingan }}.</a>
                                                    </h5>
                                                    <div class="text-muted">{{ Str::limit($postingan->deskripsi, 50) }}.
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach

                                    </div>
                                </div>
                            </div>


                        </div>

                        <div class="col-12 col-lg-6">
                            
                            <div class="card-header">
                                <div class="card-title">Komentar</div>
                            </div>

                            <div class="media mb-5 overflow-visible d-block d-sm-flex mt-5">
                                <div class="me-3 mb-2">
                                    <a href="#"> <img class="media-object rounded-circle thumb-sm" alt="64x64"
                                            src="{{ asset('assets/images/users/5.jpg') }}"> </a>
                                </div>
                                <div class="media-body overflow-visible">
                                    <div class="border mb-5 p-4 br-5">
                                        <nav class="nav float-end">
                                            <div class="dropdown">
                                                <a class="nav-link text-muted fs-16 p-0 ps-4" href="javascript:;" data-bs-toggle="dropdown"
                                                    role="button" aria-haspopup="true" aria-expanded="false"><i class="fe fe-more-vertical"></i></a>
                                                <div class="dropdown-menu dropdown-menu-end" style="">
                                                    <a class="dropdown-item" href="javascript:void(0)"><i class="fe fe-edit mx-1"></i> Edit</a>
                                                    <a class="dropdown-item" href="javascript:void(0)"><i class="fe fe-corner-up-left mx-1"></i>
                                                        Reply</a>
                                                    <a class="dropdown-item" href="javascript:void(0)"><i class="fe fe-flag mx-1"></i> Report
                                                        Abuse</a>
                                                    <a class="dropdown-item" href="javascript:void(0)"><i class="fe fe-trash-2 mx-1"></i> Delete</a>
                                                </div>
                                            </div>
                                        </nav>
                                        <h5 class="mt-0">Gavin Murray</h5>
                                        <span><i class="fe fe-thumb-up text-danger"></i></span>
                                        <p class="font-13 text-muted">Lorem ipsum dolor sit amet, quis Neque porro quisquam est, nostrud
                                            exercitation ullamco laboris commodo consequat. There’s an old maxim that states, “No fun for the
                                            writer, no fun for the reader.”No matter
                                            what industry you’re working in, as a blogger, you should live and die by this statement.</p>
                                        <a class="like" href="javascript:;">
                                            <span class="badge btn-danger-light rounded-pill py-2 px-3">
                                                <i class="fe fe-heart me-1"></i>56</span>
                                        </a>
                                        <span class="reply" id="1">
                                            <a href="javascript:;"><span class="badge btn-primary-light rounded-pill py-2 px-3"><i
                                                        class="fe fe-corner-up-left mx-1"></i>Reply</span></a>
                                        </span>
                                    </div>
                                    <div class="media mb-5 overflow-visible">
                                        <div class="me-3">
                                            <a href="#"> <img class="media-object rounded-circle thumb-sm" alt="64x64"
                                                    src="{{ asset('assets/images/users/2.jpg') }}"> </a>
                                        </div>
                                        <div class="media-body border p-4 overflow-visible br-5">
                                            <nav class="nav float-end">
                                                <div class="dropdown">
                                                    <a class="nav-link text-muted fs-16 p-0 ps-4" href="javascript:;" data-bs-toggle="dropdown"
                                                        role="button" aria-haspopup="true" aria-expanded="false"><i
                                                            class="fe fe-more-vertical"></i></a>
                                                    <div class="dropdown-menu dropdown-menu-end" style="">
                                                        <a class="dropdown-item" href="javascript:void(0)"><i class="fe fe-edit mx-1"></i> Edit</a>
                                                        <a class="dropdown-item" href="javascript:void(0)"><i class="fe fe-corner-up-left mx-1"></i>
                                                            Reply</a>
                                                        <a class="dropdown-item" href="javascript:void(0)"><i class="fe fe-flag mx-1"></i> Report
                                                            Abuse</a>
                                                        <a class="dropdown-item" href="javascript:void(0)"><i class="fe fe-trash-2 mx-1"></i>
                                                            Delete</a>
                                                    </div>
                                                </div>
                                            </nav>
                                            <h5 class="mt-0">Mozelle Belt</h5>
                                            <span><i class="fe fe-thumb-up text-danger"></i></span>
                                            <p class="font-13 text-muted">Nostrud exercatement.</p>
                                            <a class="like" href="javascript:;"><span class="badge btn-danger-light rounded-pill py-2 px-3"><i
                                                        class="fe fe-heart me-1"></i>56</span></a>
                                            <span class="reply" id="2">
                                                <a href="javascript:;"><span class="badge btn-primary-light rounded-pill py-2 px-3"><i
                                                            class="fe fe-corner-up-left mx-1"></i>Reply</span></a>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        
                            @foreach ($beritadetail->komentars as $komentar)
                            <div class="card-body pb-0">
                                <div class="media mb-5 overflow-visible d-block d-sm-flex">
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
                        
                                            <form method="POST" style="display: none;" class="comment-form mt-4"
                                                data-commentid="{{ $komentar->id }}"
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
                                                    <input type="text" class="form-control mb-2" id="nama" name="nama"
                                                        placeholder="Nama lengkap" required value="{{ $namaValue }}" {{ $readonly }}>
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
                        
                                        @foreach ($komentar->balasanKomentars as $balasan)
                                        @if ($balasan->parent_komentar_id === $komentar->id)
                                        <div class="media mb-5 overflow-visible">
                                            <div class="me-4">
                                                {{-- <a href="#"> <img class="media-object rounded-circle thumb-sm" alt="64x64"
                                                        src="../assets/images/users/2.jpg"> </a> --}}
                                            </div>
                                            <div class="media-body border  overflow-visible br-5">
                                                <h5 class="mt-0">
                                                    @if ($balasan->centang_biru)
                                                    <img src="{{ asset('assets/images/logo.webp') }}" alt="" class="img-fluid"
                                                        style="width: 24px; height: 24px;">
                                                    @endif
                                                    @php
                                                    $namaBalasan = $balasan->nama;
                                                    $namaBalasan = str_replace('(Anggota Pengurus)', '<small>(anggota pengurus)</small>',
                                                    $namaBalasan);
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
                        
                                    </div>
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
                                            <input class="form-control" id="nama" name="nama" value="{{ old('nama') }}" type="text" required=""
                                                placeholder="Username*">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-xs-12">
                                            <textarea class="form-control" id="isi_komentar"
                                                name="isi_komentar">{{ old('isi_komentar') }}</textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-xs-12">
                                            <div class="rating-stars block" id="rating-1" style="cursor: pointer;">
                                                <input type="hidden" id="rating-input" name="rating" value="{{ old('rating') }}" min="1">
                                                <i class="fa fa-star" data-value="1" style="color:#f1c40f"></i>
                                                <i class="fa fa-star" data-value="2" style="color:#f1c40f"></i>
                                                <i class="fa fa-star" data-value="3" style="color: rgb(236, 240, 241);"></i>
                                                <i class="fa fa-star" data-value="4" style="color: rgb(236, 240, 241);"></i>
                                                <i class="fa fa-star" data-value="5" style="color: rgb(236, 240, 241);"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <button type="submit" class="btn btn-primary btn-rounded  waves-effect waves-light">Submit</button>
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
