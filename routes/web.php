<?php

use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\PelaporanController;
use App\Http\Controllers\ProfileController;
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