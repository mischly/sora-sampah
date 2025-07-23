<?php

use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController; 
use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\PelaporanController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\RoleMiddleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('page.index');
});

Auth::routes();


// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('pelaporan', PelaporanController::class);   
Route::resource('artikel', ArtikelController::class);
Route::resource('jadwal', JadwalController::class);

// Middleware Profile User

Route::middleware(['auth'])->group(function () {
    Route::get('/profil', [ProfileController::class, 'index'])->name('profile.index');
    Route::get('/profil/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::match(['put', 'patch'], '/profil', [ProfileController::class, 'update'])->name('profile.update');

    Route::get('/profil/password', [ProfileController::class, 'passwordForm'])->name('profile.password.form');
    Route::put('/profil/password', [ProfileController::class, 'updatePassword'])->name('profile.password.update');

    Route::get('/profil/{id}', [ProfileController::class, 'show'])->name('profile.show');
});

// Middleware role petugas

Route::middleware(['auth', 'role:petugas,admin'])->group(function () {
    Route::get('/petugas', [PetugasController::class, 'dashboard'])->name('petugas.dashboard');
    
    Route::get('/petugas/laporan', [PelaporanController::class, 'indexPetugas'])->name('petugas.laporan.index');

    Route::get('/petugas/laporan/{id}', [PelaporanController::class, 'showPetugas'])->name('petugas.laporan.show');

    Route::patch('/petugas/laporan/{id}/selesai', [PelaporanController::class, 'markAsSelesai'])->name('petugas.laporan.selesai');
});

//middelwware role admin

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'dashboard'])->name('admin.dashboard');

    Route::put('/admin/user/{id}', [AdminUserController::class, 'update'])->name('admin.user.update');

    Route::prefix('admin')->name('admin.')->group(function () {
        Route::resource('user', AdminUserController::class);
    });

    Route::get('/admin/laporan', [PelaporanController::class, 'adminLaporan'])->name('admin.laporan.index');

    Route::get('/admin/laporan/{id}', [PelaporanController::class, 'showAdminLaporan'])->name('admin.laporan.show');
});