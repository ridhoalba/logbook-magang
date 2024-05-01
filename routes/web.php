<?php

use App\Models\Kegiatan;
use App\Http\Middleware\dosen;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AcceptKegiatan;
use App\Http\Controllers\MainController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProyekController;
use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\DosenLoginController;
use App\Http\Controllers\AcceptProyekController;
use App\Http\Controllers\DosenBerandaController;
use App\Http\Controllers\DaftarKelompokController;
use App\Http\Controllers\KomentarKegiatanController;
use App\Http\Controllers\KomentarProyekController;
use App\Http\Controllers\KorbidKelompokController;
use App\Models\KomentarKegiatan;

// Route login dosen
// Route login dosen
Route::get('/dosen/login', [DosenLoginController::class, 'index'])->name('login.dosen')->middleware('guest:dosen');
Route::post('/dosen/login', [DosenLoginController::class, 'authenticate']);
Route::post('/dosen/logout', [DosenLoginController::class, 'logout'])->middleware('auth:dosen');

// Redirect /dosen ke /dosen/login
Route::redirect('/dosen', '/dosen/login');

// Misalnya, jika ingin menerapkan middleware auth untuk halaman beranda dosen:
Route::middleware('auth:dosen')->group(function () {
    // Tambahkan rute-rute yang ingin Anda lindungi dengan middleware dosen di sini
    Route::get('/dosen', [DosenBerandaController::class, 'index']);
});

// dosen beranda kegiatan
// Route::get('/dosen/beranda/kegiatan', [DosenBerandaController::class, 'kegiatan'])->middleware('auth:dosen');
Route::get('/dosen/beranda/kegiatan/{user}', [AcceptKegiatan::class, 'kegiatanShow'])->middleware('auth:dosen')->name('kegiatan.user');

Route::resource('/dosen/beranda/kegiatan', AcceptKegiatan::class)->middleware('auth:dosen');

// komentar kegiatan
Route::post('/dosen/beranda/kegiatan/komentar', [KomentarKegiatanController::class, 'store'])->middleware('auth:dosen');
// dosen beranda proyek 
Route::get('/dosen/beranda/proyek/{user}', [AcceptProyekController::class, 'proyekShow'])->middleware('auth:dosen')->name('proyek.user');

// resource dosen proyek
Route::resource('/dosen/beranda/proyek', AcceptProyekController::class)->middleware('auth:dosen');
// komentar proyek 
Route::post('/dosen/beranda/proyek/komentar', [KomentarProyekController::class, 'store'])->middleware('auth:dosen');
// korbid | kelompok

Route::resource('/dosen/beranda/kelompok', KorbidKelompokController::class)->middleware('auth:dosen');

// Komentarkegiatan

// Rute login untuk pengguna umum
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout'])->middleware('auth');

// Rute lainnya untuk pengguna umum
Route::get('/', [MainController::class, 'show'])->middleware('auth');
Route::resource('/beranda/kegiatan', KegiatanController::class)->middleware('auth');
Route::resource('/beranda/proyek', ProyekController::class)->middleware('auth');
Route::resource('/beranda/kelompok', DaftarKelompokController::class)->middleware('auth');
Route::get('/password/reset', [LoginController::class, 'showResetPassword'])->middleware('auth');
Route::post('/password/reset', [LoginController::class, 'reset']);

