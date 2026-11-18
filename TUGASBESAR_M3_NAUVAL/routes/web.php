<?php

use App\Http\Controllers\BukuController;
use App\Http\Controllers\MahasiswaController;
use Illuminate\Support\Facades\Route;

Route::get('/', [BukuController::class, 'index'])->name('home');

Route::resource('buku', BukuController::class)->except(['create', 'show']);
Route::get('/mahasiswa', [MahasiswaController::class, 'index'])->name('mahasiswa.index');

