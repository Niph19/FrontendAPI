<?php

use App\Http\Controllers\DaftarController;
use App\Http\Controllers\JenisKelaminController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\SiswaController;
use Illuminate\Support\Facades\Route;

Route::get('/', [LandingController::class, 'index'])->name('Landing');
Route::resource('/siswa', SiswaController::class);
Route::resource('/kelas', KelasController::class);
Route::resource('/jeniskelamin', JenisKelaminController::class);
Route::resource('/osis', DaftarController::class);