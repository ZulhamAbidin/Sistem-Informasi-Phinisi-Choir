<div class="sticky">
    <div class="app-sidebar__overlay" data-bs-toggle="sidebar"></div>
    <div class="app-sidebar">
        <div class="side-header">
            <a class="header-brand1" href="/">
                {{-- icon sash --}}
                <img src="{{ asset('assets/images/brand/logo.png') }}" class="header-brand-img desktop-logo" alt="logo">
                <img src="{{ asset('assets/images/brand/logo-1.png') }}" class="header-brand-img toggle-logo" alt="logo">
                <img src="{{ asset('assets/images/brand/logo-2.png') }}" class="header-brand-img light-logo" alt="logo">
                <img src="{{ asset('assets/images/brand/logo-3.png') }}" class="header-brand-img light-logo1" alt="logo">
            </a>
            <!-- LOGO -->
        </div>
        <div class="main-sidemenu">
            <div class="slide-left disabled" id="slide-left"><svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191"
                    width="24" height="24" viewBox="0 0 24 24">
                    <path d="M13.293 6.293 7.586 12l5.707 5.707 1.414-1.414L10.414 12l4.293-4.293z" />
                </svg></div>

            <ul class="side-menu">

                <li class="sub-category">
                    <h3>Main</h3>
                </li>

                <li class="slide">
                    <a href="{{ route('admin.postingan.index') }}}" class="side-menu__item has-link active" data-bs-toggle="slide">
                        <i class="side-menu__icon fa fa-tachometer"></i>
                        <span class="side-menu__label">Dasboard</span></a>
                </li>

                <li class="slide">
                    <a class="side-menu__item has-link" data-bs-toggle="slide" href="{{ route('profile-lembaga.index') }}">
                        <i class="side-menu__icon fa fa-music"></i>
                        <span class="side-menu__label">Profile Lembaga</span>
                    </a>
                </li>

                <li class="sub-category">
                    <h3>MASTER</h3>
                </li>

                {{-- <li class="slide">
                    <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0)">
                        <i class="side-menu__icon fa fa-pencil-square"></i><span class="side-menu__label">Halaman Home</span>
                        <i class="angle fe fe-chevron-right"></i>
                    </a>
                    <ul class="slide-menu">
                        <li class="side-menu-label1"><a href="javascript:void(0)"></a></li>
                        <li><a href="{{ route('superadmin.home.index') }}" class="slide-item">Lihat Slider</a></li>
                        <li><a href="{{ route('superadmin.home.create') }}" class="slide-item">Tambah Slider</a></li>
                    </ul>
                </li>

                <li class="slide">
                    <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0)">
                        <i class="side-menu__icon fa fa-pencil-square"></i><span class="side-menu__label">Testimonial</span>
                        <i class="angle fe fe-chevron-right"></i>
                    </a>
                    <ul class="slide-menu">
                        <li class="side-menu-label1"><a href="javascript:void(0)"></a></li>
                        <li><a href="{{ route('testimonials.index') }}" class="slide-item">List Testimonial</a></li>
                        <li><a href="{{ route('testimonials.create') }}" class="slide-item">Tambah Testimonial</a></li>
                    </ul>
                </li> --}}

                <li class="slide">
                    <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0)"><i class="side-menu__icon fa fa-pencil"></i>
                        <span class="side-menu__label">Halaman Home</span><i class="angle fe fe-chevron-right"></i></a>
                
                    <ul class="slide-menu">
                
                        <li class="sub-slide">
                            <a class="sub-side-menu__item" data-bs-toggle="sub-slide" href="javascript:void(0)"><span
                                    class="sub-side-menu__label">Slider</span><i class="sub-angle fe fe-chevron-right"></i></a>
                            <ul class="sub-slide-menu">
                                <li><a class="sub-slide-item" href="{{ route('superadmin.home.index') }}">List Slider</a></li>
                                <li><a class="sub-slide-item" href="{{ route('superadmin.home.create') }}">Create Slider</a></li>
                            </ul>
                        </li>

                
                        <li class="sub-slide">
                            <a class="sub-side-menu__item" data-bs-toggle="sub-slide" href="javascript:void(0)"><span
                                    class="sub-side-menu__label">Testimonial</span><i class="sub-angle fe fe-chevron-right"></i></a>
                            <ul class="sub-slide-menu">
                                <li><a class="sub-slide-item" href="{{ route('testimonials.index') }}">List Testimonial</a></li>
                                <li><a class="sub-slide-item" href="{{ route('testimonials.create') }}">Create Testimonial</a></li>
                            </ul>
                        </li>
                    
                
                        <li class="sub-slide">
                            <a class="sub-side-menu__item" data-bs-toggle="sub-slide" href="javascript:void(0)"><span
                                    class="sub-side-menu__label">Kotak Saran</span><i class="sub-angle fe fe-chevron-right"></i></a>
                            <ul class="sub-slide-menu">
                                <li><a class="sub-slide-item" href="{{ route('admin.saran.index') }}">List Saran</a></li>
                            </ul>
                        </li>

                    </ul>

                
                </li>
                

                {{-- SUB SUB MENU POSTINGAN --}}
                <li class="slide">
                    <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0)"><i class="side-menu__icon fa fa-pencil"></i>
                    <span class="side-menu__label">Postingan</span><i class="angle fe fe-chevron-right"></i></a>

                    <ul class="slide-menu">

                        <li class="side-menu-label1"><a href="javascript:void(0)">Submenu items</a></li>

                        <li class="sub-slide">
                            <a class="sub-side-menu__item" data-bs-toggle="sub-slide" href="javascript:void(0)"><span
                                    class="sub-side-menu__label">News</span><i class="sub-angle fe fe-chevron-right"></i></a>
                            <ul class="sub-slide-menu">
                                <li><a class="sub-slide-item" href="{{ route('admin.postingan.index') }}">List News</a></li>
                                <li><a class="sub-slide-item" href="{{ route('admin.postingan.create') }}">Create News</a></li>
                            </ul>
                        </li>
                    
                        <li class="sub-slide">
                            <a class="sub-side-menu__item" data-bs-toggle="sub-slide" href="javascript:void(0)"><span
                                    class="sub-side-menu__label">Achievement</span><i class="sub-angle fe fe-chevron-right"></i></a>
                            <ul class="sub-slide-menu">
                                <li><a class="sub-slide-item" href="{{ route('admin.achievement.index') }}">List Achievement</a></li>
                                <li><a class="sub-slide-item" href="{{ route('admin.postingan.create') }}">Create Achievement</a></li>
                            </ul>
                        </li>
                        
                        <li class="sub-slide">
                            <a class="sub-side-menu__item" data-bs-toggle="sub-slide" href="javascript:void(0)"><span
                                    class="sub-side-menu__label">Competition</span><i class="sub-angle fe fe-chevron-right"></i></a>
                            <ul class="sub-slide-menu">
                                <li><a class="sub-slide-item" href="{{ route('admin.competition.index') }}">List Competition</a></li>
                                <li><a class="sub-slide-item" href="{{ route('admin.postingan.create') }}">Create Competition</a></li>
                            </ul>
                        </li>
                    </ul>
                    
                </li>
          
                {{-- <li class="slide">
                    <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0)">
                        <i class="side-menu__icon fa fa-book"></i><span class="side-menu__label">News</span>
                        <i class="angle fe fe-chevron-right"></i>
                    </a>
                    <ul class="slide-menu">
                        <li class="side-menu-label1"><a href="javascript:void(0)"></a></li>
                        <li><a href="{{ route('admin.postingan.index') }}" class="slide-item">List News</a></li>
                        <li><a href="{{ route('admin.postingan.create') }}" class="slide-item">Create News</a></li>
                    </ul>
                </li>

                <li class="slide">
                    <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0)">
                        <i class="side-menu__icon fa fa-trophy"></i><span class="side-menu__label">Achievement</span>
                        <i class="angle fe fe-chevron-right"></i>
                    </a>
                    <ul class="slide-menu">
                        <li class="side-menu-label1"><a href="javascript:void(0)"></a></li>
                        <li><a href="{{ route('admin.achievement.index') }}" class="slide-item">List Achievement</a></li>
                        <li><a href="{{ route('admin.postingan.create') }}" class="slide-item">Create Achievement</a></li>
                    </ul>
                </li>

                <li class="slide">
                    <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0)">
                        <i class="side-menu__icon fa fa-bookmark"></i><span class="side-menu__label">Competition</span>
                        <i class="angle fe fe-chevron-right"></i>
                    </a>
                    <ul class="slide-menu">
                        <li class="side-menu-label1"><a href="javascript:void(0)"></a></li>
                        <li><a href="{{ route('admin.competition.index') }}" class="slide-item">List Competition</a></li>
                        <li><a href="{{ route('admin.postingan.create') }}" class="slide-item">Create Competition</a></li>
                    </ul>
                </li> --}}

                <li class="slide">
                    <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0)">
                        <i class="side-menu__icon fa fa-street-view"></i><span class="side-menu__label">Data Anggota</span>
                        <i class="angle fe fe-chevron-right"></i>
                    </a>
                    <ul class="slide-menu">
                        <li class="side-menu-label1"><a href="javascript:void(0)"></a></li>
                        <li><a href="{{ route('dataanggota.index') }}" class="slide-item">List Data Anggota</a></li>
                        <li><a href="{{ route('dataanggota.create') }}" class="slide-item">Tambah Data Anggota</a></li>
                        <li><a href="{{ route('admin.users.index') }}" class="slide-item">Aprroval Anggota </a></li>
                    </ul>
                </li>

                <li class="slide">
                    <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0)">
                        <i class="side-menu__icon fa fa-lock"></i><span class="side-menu__label">Kelola Users Login</span>
                        <i class="angle fe fe-chevron-right"></i>
                    </a>
                    <ul class="slide-menu">
                        <li class="side-menu-label1"><a href="javascript:void(0)"></a></li>
                        <li><a href="{{ route('manajemenuser.index') }}" class="slide-item">List User Login </a></li>
                        <li><a href="{{ route('manajemenuser.create') }}" class="slide-item">Tambah User Login </a></li>
                    </ul>
                </li>

                

                <li class="sub-category">
                    <h3>General</h3>
                </li>

                <li class="slide">
                    <a class="side-menu__item has-link" data-bs-toggle="slide" href="">
                        <i class="side-menu__icon fa fa-cog"></i>
                        <span class="side-menu__label">Pengaturan Profile</span>
                    </a>
                </li>
                
                <li class="slide">
                    <form action="{{ route('logout') }}" method="post" class="side-menu__item has-link" data-bs-toggle="slide">
                        @csrf
                        <i class="side-menu__icon mr-2 fa fa-sign-out"></i>
                        <button type="submit" class="border-0 bg-transparent">
                            <span class="side-menu__label">Sign out</span>
                        </button>
                    </form>
                </li>

            </ul>
            <div class="slide-right" id="slide-right"><svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191"
                    width="24" height="24" viewBox="0 0 24 24">
                    <path d="M10.707 17.707 16.414 12l-5.707-5.707-1.414 1.414L13.586 12l-4.293 4.293z" />
                </svg></div>
        </div>
    </div>

</div>
