<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProyekController;
use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\KelompokController;

Route::get('/', [MainController::class, 'show'])->middleware('auth');

Route::resource('/beranda/kegiatan', KegiatanController::class)->middleware('auth');
Route::resource('/beranda/proyek', ProyekController::class)->middleware('auth');

// login
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

// password

Route::get('/password/reset', [LoginController::class, 'showResetPassword'])->middleware('auth');
Route::post('/password/reset', [LoginController::class, 'reset']);
