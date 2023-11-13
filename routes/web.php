<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\SuperAdminController;
use App\Http\Controllers\Admin\SaranController;
use App\Http\Controllers\DataAnggotaController;
use App\Http\Controllers\Admin\ApprovalController;
use App\Http\Controllers\Admin\CarouselController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PostinganController;
use App\Http\Controllers\Admin\AchievementController;
use App\Http\Controllers\Admin\CompetitionController;
use App\Http\Controllers\Admin\TestimonialsController;
use App\Http\Controllers\Admin\ManajemenUserController;
use App\Http\Controllers\Admin\ProfileLembagaController;
use App\Http\Controllers\Pengunjung\PengunjungController;
use App\Http\Controllers\Admin\DataAnggotaController as DataAnggotaControllerList;

//HALAMAN UTAMA
Route::get('/', [WelcomeController::class, 'index'])->name('welcome');
Route::post('/submit-saran', [WelcomeController::class, 'submitSaran'])->name('submit-saran');
Route::get('/about', [ProfileLembagaController::class, 'about'])->name('about');

//DASHBOARD
Route::get('/SuperAdmin/dashboard', [DashboardController::class, 'index'])
    ->name('admin.dashboard')
    ->middleware(['super_admin']);

// Menampilkan daftar saran
Route::get('/SuperAdmin/saran', [WelcomeController::class, 'indexsaran'])
    ->name('admin.saran.index')
    ->middleware(['super_admin']);
Route::delete('/SuperAdmin/saran/{id}', [WelcomeController::class, 'destroy'])
    ->name('admin.saran.destroy')
    ->middleware(['super_admin']);

//INPUT DATA ANGGOTA PENGURUS ROLE = USER ADMIN
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin', [DataAnggotaController::class, 'index'])->name('admin.index');
    Route::get('/admin/get-user-data', [DataAnggotaController::class, 'getUserData'])->name('get.user.data');
    Route::get('/admin/create', [DataAnggotaController::class, 'create'])->name('admin.create');
    Route::post('/admin', [DataAnggotaController::class, 'store'])->name('admin.store');
    Route::get('/admin/edit', [DataAnggotaController::class, 'edit'])->name('admin.edit');
});

//DASHBOARD SUPER ADMIN BARU
Route::middleware(['auth', 'super_admin'])->group(function () {
    Route::get('/super_admin', [SuperAdminController::class, 'index'])->name('super_admin.index');
});

// LOGIN ADMIN DAN SUPER ADMIN
Route::get('/login', [LoginController::class, 'showLoginForm'])
    ->name('login')
    ->middleware('guest');
Route::post('/login', [LoginController::class, 'login'])->middleware('guest');
Route::post('/change-role', [LoginController::class, 'changeRole'])->name('change.role');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

//DASHBOARD SUPER ADMIN LAMA
Route::get('/dashboard', function () {
    return view('dashboard');
})
    ->middleware(['auth', 'verified', 'verifyUserStatus'])
    ->name('dashboard');

// APPROVAL ANGGOTA  ROLE = USER SUPER ADMIN
Route::prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::post('users/{user}/update-status', [ApprovalController::class, 'updateStatus'])
            ->name('admin.users.updateStatus')
            ->middleware(['super_admin']);
        Route::get('users', [ApprovalController::class, 'index'])
            ->name('users.index')
            ->middleware(['super_admin']);
    });

Route::middleware(['auth', 'super_admin'])->group(function () {
    //UPDATE PROFILE PRIBADI ROLE = USER SUPER ADMIN, ADMIN
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    // Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::put('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
});

// PENGUNJUNG LIST ALL KATEGORY
Route::get('/pengunjung', [PengunjungController::class, 'ListBerita'])->name('ListBerita');
Route::get('/pengunjung/competition', [PengunjungController::class, 'ListCompetition'])->name('ListCompetition');
Route::get('/pengunjung/achievement', [PengunjungController::class, 'ListAchievement'])->name('ListAchievement');

//DETAIL ALL KATEGORY
Route::get('/pengunjung/{id}/postingan-lainnya', [PengunjungController::class, 'tampilkanPostinganLainnya'])->name('pengunjung.news.postingan-lainnya');
Route::get('/pengunjung/{id}', [PengunjungController::class, 'DetailBerita'])->name('pengunjung.news.show');
Route::post('/pengunjung/{id}/tambah-komentar', [PengunjungController::class, 'tambahKomentar'])->name('pengunjung.news.komentar.tambah');
Route::post('/pengunjung/{beritadetail}/{komentarId}/tambah-balasan-komentar', [PengunjungController::class, 'tambahBalasanKomentar'])->name('pengunjung.news.tambah-balasan-komentar');
Route::post('/pengunjung/delete-komentar/{komentarId}', [PengunjungController::class, 'hapusKomentar'])->name('pengunjung.news.komentar.hapus');
Route::post('/pengunjung/{komentarId}/hapus-balasan-komentar', [PengunjungController::class, 'hapusBalasanKomentar'])->name('pengunjung.news.komentar.balasan.hapus');
Route::post('/pengunjung/{id}/like', [PengunjungController::class, 'likePostingan'])->name('pengunjung.news.like');
Route::post('/pengunjung/komentar/{id}/like', [PengunjungController::class, 'likeKomentar'])->name('komentar.like');
Route::post('/pengunjung/balasan_komentar/{id}/like', [PengunjungController::class, 'likeBalasanKomentar'])->name('balasan_komentar.like');

Route::middleware(['super_admin'])->group(function () {
    //DATA ANGGOTA
    Route::get('/SuperAdmin/dataanggota/index', [DataAnggotaControllerList::class, 'index'])->name('dataanggota.index');
    Route::get('/SuperAdmin/dataanggota/{id}', [DataAnggotaControllerList::class, 'show'])->name('detail.anggota');
    Route::get('/SuperAdmin/dataanggota/create', [DataAnggotaControllerList::class, 'create'])->name('dataanggota.create');
    Route::post('/SuperAdmin/dataanggota/store', [DataAnggotaControllerList::class, 'store'])->name('dataanggota.store');
    Route::delete('/SuperAdmin/dataanggota/{id}', [DataAnggotaControllerList::class, 'destroy'])->name('dataanggota.destroy');
    Route::get('/SuperAdmin/dataanggota/{id}/edit', [DataAnggotaControllerList::class, 'edit'])->name('dataanggota.edit');
    Route::put('/SuperAdmin/dataanggota/{id}', [DataAnggotaControllerList::class, 'update'])->name('dataanggota.update');

    // POSTINGAN ROLE = USER SUPER ADMIN
    Route::get('/admin/postingan', [PostinganController::class, 'index'])->name('admin.postingan.index');
    Route::get('/admin/achievement', [AchievementController::class, 'index'])->name('admin.achievement.index');
    Route::get('/admin/competition', [CompetitionController::class, 'index'])->name('admin.competition.index');

    Route::get('/admin/postingan/create', [PostinganController::class, 'create'])->name('admin.postingan.create');
    Route::post('/admin/postingan', [PostinganController::class, 'store'])->name('admin.postingan.store');
    Route::get('/admin/postingan/{id}', [PostinganController::class, 'show'])->name('admin.postingan.show');
    Route::delete('/admin/postingan/{id}', [PostinganController::class, 'destroy'])->name('admin.postingan.destroy');
    Route::get('/admin/postingan/{id}/edit', [PostinganController::class, 'edit'])->name('admin.postingan.edit');
    Route::put('/admin/postingan/{id}', [PostinganController::class, 'update'])->name('admin.postingan.update');
});

// TAMBAH SLIDER PADA HALAMAN HOME  ROLE = USER SUPER ADMIN
Route::prefix('SuperAdmin/home')->group(function () {
    Route::get('index', [CarouselController::class, 'index'])
        ->name('superadmin.home.index')
        ->middleware(['super_admin']);
    Route::get('create', [CarouselController::class, 'create'])
        ->name('superadmin.home.create')
        ->middleware(['super_admin']);
    Route::post('store', [CarouselController::class, 'store'])
        ->name('superadmin.home.store')
        ->middleware(['super_admin']);
    Route::get('edit/{carousel}', [CarouselController::class, 'edit'])
        ->name('superadmin.home.edit')
        ->middleware(['super_admin']);
    Route::put('update/{carousel}', [CarouselController::class, 'update'])
        ->name('superadmin.home.update')
        ->middleware(['super_admin']);
    Route::delete('destroy/{carousel}', [CarouselController::class, 'destroy'])
        ->name('superadmin.home.destroy')
        ->middleware(['super_admin']);
});

//TESTIMONIALS
Route::get('/SuperAdmin/testimonials', [TestimonialsController::class, 'index'])
    ->name('testimonials.index')
    ->middleware(['super_admin']);
Route::get('/SuperAdmin/testimonials/create', [TestimonialsController::class, 'create'])
    ->name('testimonials.create')
    ->middleware(['super_admin']);
Route::post('/SuperAdmin/testimonials', [TestimonialsController::class, 'store'])
    ->name('testimonials.store')
    ->middleware(['super_admin']);
Route::get('/SuperAdmin/testimonials/{id}/edit', [TestimonialsController::class, 'edit'])
    ->name('testimonials.edit')
    ->middleware(['super_admin']);
Route::put('/SuperAdmin/testimonials/{id}', [TestimonialsController::class, 'update'])
    ->name('testimonials.update')
    ->middleware(['super_admin']);
Route::delete('/SuperAdmin/testimonials/{id}', [TestimonialsController::class, 'destroy'])
    ->name('testimonials.destroy')
    ->middleware(['super_admin']);

Route::prefix('SuperAdmin/manajemenuser')
    ->middleware(['super_admin'])
    ->group(function () {
        Route::get('list', [ManajemenUserController::class, 'index'])->name('manajemenuser.index');
        Route::get('list/create', [ManajemenUserController::class, 'create'])->name('manajemenuser.create');
        Route::post('list', [ManajemenUserController::class, 'store'])->name('manajemenuser.store');
        Route::get('list/{id}/edit', [ManajemenUserController::class, 'edit'])->name('manajemenuser.edit');
        Route::put('list/{id}', [ManajemenUserController::class, 'update'])->name('manajemenuser.update');
        Route::delete('list/{id}', [ManajemenUserController::class, 'destroy'])->name('manajemenuser.destroy');
    });

Route::get('/superadmin/profilelembaga', [ProfileLembagaController::class, 'index'])
    ->name('profile-lembaga.index')
    ->middleware(['super_admin']);
Route::get('/superadmin/profilelembaga/create', [ProfileLembagaController::class, 'create'])
    ->name('profile-lembaga.create')
    ->middleware(['super_admin']);
Route::post('/superadmin/profilelembaga', [ProfileLembagaController::class, 'store'])
    ->name('profile-lembaga.store')
    ->middleware(['super_admin']);
Route::get('/superadmin/profilelembaga/{id}', [ProfileLembagaController::class, 'show'])
    ->name('profile-lembaga.show')
    ->middleware(['super_admin']);
Route::get('/superadmin/profilelembaga/{id}/edit', [ProfileLembagaController::class, 'edit'])
    ->name('profile-lembaga.edit')
    ->middleware(['super_admin']);
Route::put('/superadmin/profilelembaga/{id}', [ProfileLembagaController::class, 'update'])
    ->name('profile-lembaga.update')
    ->middleware(['super_admin']);
Route::delete('/superadmin/profilelembaga/{id}', [ProfileLembagaController::class, 'destroy'])
    ->name('profile-lembaga.destroy')
    ->middleware(['super_admin']);

require __DIR__ . '/auth.php';
