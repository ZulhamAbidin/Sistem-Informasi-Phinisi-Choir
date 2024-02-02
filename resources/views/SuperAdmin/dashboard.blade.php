@extends('layouts.main')
@section('container')


    <div class="main-container container-fluid">
        <div class="page-header">
            <h1 class="page-title">Dashboard</h1>
            <div>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('superadmin.home.index') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Admin</li>
                </ol>
            </div>
        </div>
    </div>

    <div class="row">

        <div class="col-lg-12 col-md-12 col-sm-12 col-xl-12">
            <div class="row">

                

                {{-- TOTAL USER LOGIN --}}
                <div class="col-lg-4 col-md-4 col-sm-6 col-xl-3">
                    <div class="card overflow-hidden">
                        <div class="card-body text-center">
                            <div class="">
                                <div class="mt-2">
                                    <h6 class="">Total Users Login</h6>
                                    <h2 class="mb-0 number-font">{{ $totalUsers }}</h2>
                                </div>
                            </div><br>
                            <span class="text-muted fs-12"><span class="text-secondary "><i class="fe fe-arrow-up-circle  text-secondary"></i></span>
                                                    Dalam Beberapa Waktu Terakhir</span>
                        </div>
                    </div>
                </div>

                {{-- TOTAL USER ADMIN --}}
                <div class="col-lg-4 col-md-4 col-sm-6 col-xl-3">
                    <div class="card overflow-hidden">
                        <div class="card-body text-center">
                            <div class="">
                                <div class="mt-2">
                                    <h6 class="">Total Admin</h6>
                                    <h2 class="mb-0 number-font">{{ $totalSuperAdmins }}</h2>
                                </div>
                            </div><br>
                            <span class="text-muted fs-12"><span class="text-secondary "><i class="fe fe-arrow-up-circle  text-secondary"></i> </span>
                                                    Dalam Beberapa Waktu Terakhir</span>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-4 col-sm-6 col-xl-3">
                    <div class="card overflow-hidden">
                        <div class="card-body text-center">
                            <div class="">
                                <div class="mt-2">
                                    <h6 class="">Total Anggota Yang Telah Melengkapi Data</h6>
                                    <h2 class="mb-0 number-font">{{ $totalAnggota }}</h2>
                                </div>
                            </div><br>
                            <span class="text-muted fs-12"><span class="text-secondary "><i class="fe fe-arrow-up-circle  text-secondary"></i> </span>
                                                    Dalam Beberapa Waktu Terakhir</span>
                        </div>
                    </div>
                </div>

                {{-- TOTAL USER ANGGOTA YANG TEVERIFIKASI --}}
                <div class="col-lg-4 col-md-4 col-sm-6 col-xl-3">
                    <div class="card overflow-hidden">
                        <div class="card-body text-center">
                            <div class="">
                                <div class="mt-2">
                                    <h6 class="">Total Anggota Yang Terverifikasi</h6>
                                    <h2 class="mb-0 number-font">{{ $totalVerifiedUsers }}</h2>
                                </div>
                            </div><br>
                            <span class="text-muted fs-12"><span class="text-secondary "><i class="fe fe-arrow-up-circle  text-secondary"></i> </span>
                                                    Dalam Beberapa Waktu Terakhir</span>
                        </div>
                    </div>
                </div>

                {{-- TOTAL USER ANGGOTA YANG BELUM TEVERIFIKASI --}}
                <div class="col-lg-4 col-md-4 col-sm-6 col-xl-3">
                    <div class="card overflow-hidden">
                        <div class="card-body text-center">
                            <div class="">
                                <div class="mt-2">
                                    <h6 class="">Total Anggota Yang Belum Terverifikasi</h6>
                                    <h2 class="mb-0 number-font">{{ $totalUnverifiedUsers }}</h2>
                                </div>
                            </div><br>
                            <span class="text-muted fs-12"><span class="text-secondary "><i class="fe fe-arrow-up-circle  text-secondary"></i> </span>
                                                    Dalam Beberapa Waktu Terakhir</span>
                        </div>
                    </div>
                </div>
        
                <div class="col-lg-4 col-md-4 col-sm-6 col-xl-3">
                    <div class="card overflow-hidden">
                        <div class="card-body text-center">
                            <div class="">
                                <div class="mt-2">
                                    <h6 class="">Total Postingan Berita</h6>
                                    <h2 class="mb-0 number-font">{{ $totalNews }}</h2>
                                </div>
                            </div><br>
                            <span class="text-muted fs-12"><span class="text-secondary "><i class="fe fe-arrow-up-circle  text-secondary"></i> </span>
                                                    Dalam Beberapa Waktu Terakhir</span>
                        </div>
                    </div>
                </div>
        
                <div class="col-lg-4 col-md-4 col-sm-6 col-xl-3">
                    <div class="card overflow-hidden">
                        <div class="card-body text-center">
                            <div class="">
                                <div class="mt-2">
                                    <h6 class="">Total Postingan Kompetisi</h6>
                                    <h2 class="mb-0 number-font">{{ $totalCompetition }}</h2>
                                </div>
                            </div><br>
                            <span class="text-muted fs-12"><span class="text-secondary "><i class="fe fe-arrow-up-circle  text-secondary"></i> </span>
                                                    Dalam Beberapa Waktu Terakhir</span>
                        </div>
                    </div>
                </div>
        
                <div class="col-lg-4 col-md-4 col-sm-6 col-xl-3">
                    <div class="card overflow-hidden">
                        <div class="card-body text-center">
                            <div class="">
                                <div class="mt-2">
                                    <h6 class="">Total Postingan Pencapaian</h6>
                                    <h2 class="mb-0 number-font">{{ $totalAchievement }}</h2>
                                </div>
                            </div><br>
                            <span class="text-muted fs-12"><span class="text-secondary "><i class="fe fe-arrow-up-circle  text-secondary"></i> </span>
                                                    Dalam Beberapa Waktu Terakhir</span>
                        </div>
                    </div>
                </div>
        
                <div class="col-lg-4 col-md-4 col-sm-6 col-xl-3">
                    <div class="card overflow-hidden">
                        <div class="card-body text-center">
                            <div class="">
                                <div class="mt-2">
                                    <h6 class="">Total Komentar</h6>
                                    <h2 class="mb-0 number-font">{{ $totalKomentar }}</h2>
                                </div>
                            </div><br>
                            <span class="text-muted fs-12"><span class="text-secondary "><i class="fe fe-arrow-up-circle  text-secondary"></i> </span>
                                                    Dalam Beberapa Waktu Terakhir</span>
                        </div>
                    </div>
                </div>
    
        
                <div class="col-lg-4 col-md-4 col-sm-6 col-xl-3">
                    <div class="card overflow-hidden">
                        <div class="card-body text-center">
                            <div class="">
                                <div class="mt-2">
                                    <h6 class="">Total Saran</h6>
                                    <h2 class="mb-0 number-font">{{ $totalSaran }}</h2>
                                </div>
                            </div><br>
                            <span class="text-muted fs-12"><span class="text-secondary "><i class="fe fe-arrow-up-circle  text-secondary"></i> </span>
                                                    Dalam Beberapa Waktu Terakhir</span>
                        </div>
                    </div>
                </div>
        
                <div class="col-lg-4 col-md-4 col-sm-6 col-xl-3">
                    <div class="card overflow-hidden">
                        <div class="card-body text-center">
                            <div class="">
                                <div class="mt-2">
                                    <h6 class="">Total Testimoni</h6>
                                    <h2 class="mb-0 number-font">{{ $totalTestimoni }}</h2>
                                </div>
                            </div><br>
                            <span class="text-muted fs-12"><span class="text-secondary "><i class="fe fe-arrow-up-circle  text-secondary"></i> </span>
                                                    Dalam Beberapa Waktu Terakhir</span>
                        </div>
                    </div>
                </div>
        
                
        
                <div class="col-lg-4 col-md-4 col-sm-6 col-xl-3">
                    <div class="card overflow-hidden">
                        <div class="card-body text-center">
                            <div class="">
                                <div class="mt-2">
                                    <h6 class="">Total Slider</h6>
                                    <h2 class="mb-0 number-font">{{ $totalCarousel }}</h2>
                                </div>
                            </div><br>
                            <span class="text-muted fs-12"><span class="text-secondary "><i class="fe fe-arrow-up-circle  text-secondary"></i> </span>
                                                    Dalam Beberapa Waktu Terakhir</span>
                        </div>
                    </div>
                </div>
        
            </div>
        </div>


    </div>
@endsection
