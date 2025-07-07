<?php

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
Route::resource('profile', ProfileController::class);
Route::resource('jadwal', JadwalController::class);
Route::resource('petugas', PetugasController::class);

Route::get('/menu', function () {
    return view('menu.index');
})->name('menu.index');


// Middleware role petugas

Route::middleware(['auth', RoleMiddleware::class . ':petugas'])->group(function () {
    Route::get('/petugas', function () {
        return view('petugas.index');
    })->name('petugas.index');
});