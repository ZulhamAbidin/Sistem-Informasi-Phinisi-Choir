<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\SuperAdminController;
use App\Http\Controllers\DataAnggotaController;
use App\Http\Controllers\Admin\ApprovalController;
use App\Http\Controllers\Admin\CarouselController;
use App\Http\Controllers\Admin\PostinganController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [WelcomeController::class, 'index'])->name('welcome');

Route::middleware(['auth', 'admin', 'verifyUserStatus'])->group(function () {
    Route::get('/admin', [DataAnggotaController::class, 'index'])->name('admin.index');
    Route::get('/admin/get-user-data', [DataAnggotaController::class, 'getUserData'])->name('get.user.data');
    Route::get('/admin/create', [DataAnggotaController::class, 'create'])->name('admin.create');
    Route::post('/admin', [DataAnggotaController::class, 'store'])->name('admin.store');
    Route::get('/admin/edit', [DataAnggotaController::class, 'edit'])->name('admin.edit');
});

Route::middleware(['auth', 'super_admin'])->group(function () {
    Route::get('/super_admin', [SuperAdminController::class, 'index'])->name('super_admin.index');
});

Route::get('/login', [LoginController::class, 'showLoginForm'])
    ->name('login')
    ->middleware('guest');

Route::post('/login', [LoginController::class, 'login'])->middleware('guest');
Route::post('/change-role', [LoginController::class, 'changeRole'])->name('change.role');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


Route::prefix('SuperAdmin/home')->group(function () {
    Route::get('index', [CarouselController::class, 'index'])->name('superadmin.home.index');
    Route::get('create', [CarouselController::class, 'create'])->name('superadmin.home.create');
    Route::post('store', [CarouselController::class, 'store'])->name('superadmin.home.store');
    Route::get('edit/{carousel}', [CarouselController::class, 'edit'])->name('superadmin.home.edit');
    Route::put('update/{carousel}', [CarouselController::class, 'update'])->name('superadmin.home.update');
    Route::delete('destroy/{carousel}', [CarouselController::class, 'destroy'])->name('superadmin.home.destroy');

});

Route::get('/dashboard', function () {
    return view('dashboard');
})
    ->middleware(['auth', 'verified', 'verifyUserStatus'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::prefix('admin')->name('admin.')->group(function () {
    Route::post('users/{user}/update-status', [ApprovalController::class, 'updateStatus'])->name('admin.users.updateStatus');
    Route::get('users', [ApprovalController::class, 'index'])->name('users.index');
});

Route::middleware(['auth', 'super_admin'])->group(function () {
    Route::get('/admin/postingan/create', [PostinganController::class, 'create'])->name('admin.postingan.create');
    Route::get('/admin/postingan', [PostinganController::class, 'index'])->name('admin.postingan.index');
    Route::post('/admin/postingan', [PostinganController::class, 'store'])->name('admin.postingan.store');
    Route::get('/admin/postingan/{id}', [PostinganController::class, 'show'])->name('admin.postingan.show');
    Route::delete('/admin/postingan/{id}', [PostinganController::class, 'destroy'])->name('admin.postingan.destroy');
    Route::get('/admin/postingan/{id}/edit', [PostinganController::class, 'edit'])->name('admin.postingan.edit');
    Route::put('/admin/postingan/{id}', [PostinganController::class, 'update'])->name('admin.postingan.update');
});

require __DIR__ . '/auth.php';