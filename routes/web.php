<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\DokumenController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\InformasiController;
use App\Models\Informasi;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('landing', ['informasi' => Informasi::orderBy('urutan')->orderByDesc('tanggal')->limit(4)->get()]);
})->name('home');

Route::get('/berita', [BeritaController::class, 'publicIndex'])->name('berita.index');
Route::get('/berita/{berita}', [BeritaController::class, 'show'])->name('berita.show');
Route::view('/visi-misi', 'profil-instansi.visi-misi')->name('visi-misi');
Route::view('/struktur-organisasi', 'profil-instansi.struktur-organisasi')->name('struktur-organisasi');
Route::get('/dokumen', [DokumenController::class, 'publicIndex'])->name('dokumen.index');
Route::get('/faq', [FaqController::class, 'publicIndex'])->name('faq.index');

Route::middleware(['guest'])->group(function () {

    Route::get('/login', [AuthController::class, 'showFormLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.post');

    Route::get('/register', [AuthController::class, 'showFormRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register'])->name('register.post');
});

Route::middleware(['auth'])->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::resource('dashboard/informasi', InformasiController::class)
        ->except(['show'])
        ->names('informasi');

    Route::resource('dashboard/berita', BeritaController::class)
        ->except(['index', 'show'])
        ->parameters(['berita' => 'berita'])
        ->names('berita');

    Route::resource('dashboard/faq', FaqController::class)
        ->except(['index', 'show'])
        ->names('faq');

    Route::resource('dashboard/dokumen', DokumenController::class)
        ->except(['index', 'show'])
        ->parameters(['dokumen' => 'dokumen'])
        ->names('dokumen');

    Route::get('/dashboard', [InformasiController::class, 'index'])->name('dashboard');
});
