<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ZakatController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/login', [HomeController::class, 'login'])->name('login');
Route::post('/prosesLogin', [HomeController::class, 'ProsesLogin'])->name('ProsesLogin');
Route::get('/logout', [HomeController::class, 'logout'])->name('logout');
Route::get('/zakat', [ZakatController::class, 'index'])->name('zakat');
Route::get('/kategori/detail/{id}', [ZakatController::class, 'detail'])->name('detail');
Route::get('/berita/{id}',[ZakatController::class, 'beritahome'])->name('home.berita');
Route::get('/tentangkmi',[ZakatController::class , 'tentangkami'])->name('tentang.kami');
Route::get('/berita/detail/{id}',[ZakatController::class , 'detailberita'])->name('detail.berita');
Route::get('/tentang/zakat/home/{id}',[ZakatController::class, 'tentangzakathome'])->name('home.tentang');
Route::get('/tentang/zakat/detail/{id}',[ZakatController::class, 'tentangzakatdetail'])->name('detail.tentang');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');
    Route::get('/histori/donasi', [ZakatController::class, 'Donasi'])->name('donasi');
    Route::get('/tabel/donasi', [ZakatController::class, 'TabelDonasi'])->name('tabel.donasi');
    Route::get('/berita',[ZakatController::class, 'berita'])->name('berita');
    Route::get('/zakat/berita/tambah',[ZakatController::class,'tambahberita']);
    Route::post('/zakat/berita/simpan',[ZakatController::class,'simpanberita']);
    Route::get('/zakat/berita/hapus/{id}',[ZakatController::class,'hapusberita']);
    Route::get('/tentang/zakat',[ZakatController::class,'tentangzakat'])->name('tentangzakat');
    Route::get('/tentang/zakat/form',[ZakatController::class,'formzakat']);
    Route::post('/tentang/zakat/simpan',[ZakatController::class, 'zakatsimpan']);
    Route::get('/tentang/zakat/hapus/{id}',[ZakatController::class, 'tentanghapus']);
});
