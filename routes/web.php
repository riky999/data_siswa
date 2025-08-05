<?php

use App\Http\Controllers\HalamanController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\PengumumanController;
use Illuminate\Support\Facades\Route;

// ---------------- AUTH & SESSION ---------------- //
Route::get('/sesi', [SessionController::class, 'index'])->name('login');
Route::post('/sesi/login', [SessionController::class, 'login']);
Route::get('/sesi/logout', [SessionController::class, 'logout']);
Route::get('/sesi/register', [SessionController::class, 'register']);
Route::post('/sesi/create', [SessionController::class, 'create']);

// ---------------- ROUTES YANG BUTUH LOGIN ---------------- //
Route::middleware(['auth'])->group(function () {

    // Halaman Umum
    Route::get('/', [HalamanController::class, 'index']);
    Route::get('/kontak', [HalamanController::class, 'kontak']);
    Route::get('/tentang', [HalamanController::class, 'tentang']);

    // Siswa - bisa diakses semua user
    Route::get('/siswa', [SiswaController::class, 'index'])->name('siswa.index');
Route::get('/siswa/create', [SiswaController::class, 'create'])->name('siswa.create'); // Pindah ke atas
Route::get('/siswa/cetak/pdf', [SiswaController::class, 'cetakPdf'])->name('siswa.pdf');
Route::get('/siswa/{id}', [SiswaController::class, 'detail'])->name('siswa.detail');

    // Admin Full Access ke semua kecuali index dan show (biar gak bentrok)
    Route::middleware(['role:admin'])->group(function () {
        Route::resource('siswa', SiswaController::class)->except(['index', 'show']);
    });

    // User Boleh Buat Data Diri Siswa
    Route::middleware(['role:user'])->group(function () {
        Route::get('/siswa/create', [SiswaController::class, 'create'])->name('siswa.create');
        Route::post('/siswa', [SiswaController::class, 'store'])->name('siswa.store');
    });

   

    // Pengumuman
    Route::get('/pengumuman', [PengumumanController::class, 'index'])->name('pengumuman.index');

    Route::middleware(['role:admin'])->group(function () {
        Route::get('/pengumuman/create', [PengumumanController::class, 'create'])->name('pengumuman.create');
        Route::post('/pengumuman', [PengumumanController::class, 'store'])->name('pengumuman.store');
        Route::get('/pengumuman/{id}/edit', [PengumumanController::class, 'edit'])->name('pengumuman.edit');
        Route::put('/pengumuman/{id}', [PengumumanController::class, 'update'])->name('pengumuman.update');
        Route::delete('/pengumuman/{id}', [PengumumanController::class, 'destroy'])->name('pengumuman.destroy');
    });

});
