<?php

use App\Http\Controllers\HalamanController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\SiswaController;
use Illuminate\Support\Facades\Route;




// Route::get('/siswa', function () {
//     return "<h1>saya siswa</h1>";
// });

// Route::get('/', function () {
//     return view('/halaman/index');


route::get('/sesi',[SessionController::class, 'index'])->name('login');

route::post('/sesi/login',[SessionController::class, 'login']);

route::get('/sesi/logout',[SessionController::class, 'logout']);

route::get('/sesi/register',[SessionController::class, 'register']);

route::post('/sesi/create',[SessionController::class, 'create']);
Route::middleware(['auth'])->group(function () {


    route::resource('siswa',SiswaController::class);

route::get('siswa',[SiswaController::class, 'index']);
route::get('siswa/{id}',[SiswaController::class, 'detail']);

route::get('/',[HalamanController::class, 'index']);
route::get('/kontak',[HalamanController::class, 'kontak']);
route::get('/tentang',[HalamanController::class, 'tentang']);


Route::middleware(['auth'])->group(function () {
    Route::get('/', [HalamanController::class, 'index']);
    Route::get('/kontak', [HalamanController::class, 'kontak']);
    Route::get('/tentang', [HalamanController::class, 'tentang']);

    // semua user bisa lihat index dan detail
    Route::get('siswa', [SiswaController::class, 'index']);
    Route::get('siswa/{id}', [SiswaController::class, 'detail']);

    // hanya admin bisa CRUD penuh
    Route::middleware(['role:admin'])->group(function () {
        Route::resource('siswa', SiswaController::class)->except(['index', 'show']);
    });

    // Route::get('/siswa/cetak/pdf', [SiswaController::class, 'cetakPdf'])->middleware('auth');
    Route::get('/siswa/cetak/pdf', [SiswaController::class, 'cetakPdf'])->name('siswa.pdf');


   

    

});

});