<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\laporanController;
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
Route::get('/kategori/detail/{id}', [ZakatController::class, 'detail'])->name('detail');
Route::get('/berita/{id}',[ZakatController::class, 'beritahome'])->name('home.berita');
Route::get('/tentangkmi',[ZakatController::class , 'tentangkami'])->name('tentang.kami');
Route::get('/berita/detail/{id}',[ZakatController::class , 'detailberita'])->name('detail.berita');
Route::get('/tentang/zakat/home/{id}',[ZakatController::class, 'tentangzakathome'])->name('home.tentang');
Route::get('/tentang/zakat/detail/{id}',[ZakatController::class, 'tentangzakatdetail'])->name('detail.tentang');
Route::get('/register',[HomeController::class, 'register'])->name('register');
Route::post('/prosesRegister',[HomeController::class, 'ProsesRegister'])->name('ProsesRegister');
Route::get('/faq',[HomeController::class, 'faq'])->name('faq');
Route::post('/kritik/saran',[HomeController::class, 'KritikSaran'])->name('KritikSaran');
Route::get('/calculator/zakat',[ZakatController::class, 'calculator'])->name('calculator');
Route::middleware(['auth', 'CekLevel:admin,user,sekretaris'])->group(function () {
    Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');
});

Route::middleware(['auth', 'CekLevel:sekretaris'])->group(function () {
    Route::get('/donasi/masuk', [laporanController::class, 'donasimasuk'])->name('donasi.masuk');
    Route::get('/donasi/keluar', [laporanController::class, 'donasikeluar'])->name('donasi.keluar');
});

Route::middleware(['auth', 'CekLevel:admin,sekretaris'])->group(function () {
    Route::get('/histori/donasi/admin', [ZakatController::class, 'Donasi'])->name('donasi.zakat');
    Route::post('/histori/donasi/admin/detail/',[ZakatController::class, 'DetailDonasi'])->name('detail.donasi');
    Route::get('/tabel/donasi', [ZakatController::class, 'TabelDonasi'])->name('tabel.donasi');
    Route::get('/histori/donasi/infak', [ZakatController::class, 'DonasiInfak'])->name('donasi.infak');
    Route::get('/tabel/donasi/infak', [ZakatController::class, 'TabelDonasiInfak'])->name('tabel.donasi.infak');
    Route::get('/histori/donasi/sedekah', [ZakatController::class, 'DonasiSedekah'])->name('donasi.sedekah');
    Route::get('/tabel/donasi/sedekah', [ZakatController::class, 'TabelDonasiSedekah'])->name('tabel.donasi.sedekah');
    Route::post('/cetak/laporan',[ZakatController::class, 'cetak'])->name('cetak');
    Route::post('/cetak/laporan/infak',[ZakatController::class, 'cetakinfak'])->name('cetakinfak');
    Route::post('/cetak/laporan/sedekah',[ZakatController::class, 'cetaksedekah'])->name('cetaksedekah');
    Route::get('/donasi/keluar/zakat',[ZakatController::class, 'donasikeluar'])->name('donasikeluar');
    Route::get('/donasi/keluar/zakat/form',[ZakatController::class,'formdonasikeluar'])->name('formdonasikeluar');
    Route::post('/donasi/keluar/zakat/simpan',[ZakatController::class,'pengeluaranzakatsimpan']);
    Route::get('/donasi/keluar/zakat/hapus/{id}',[ZakatController::class, 'hapuspengeluaranzakat'])->name('hapuspengeluaranzakat');
    Route::get('/donasi/keluar/infak',[ZakatController::class, 'donasikeluarinfak'])->name('donasikeluarinfak');
    Route::get('/donasi/keluar/infak/form',[ZakatController::class,'formdonasikeluarinfak'])->name('formdonasikeluarinfak');
    Route::get('/donasi/keluar/sedekah',[ZakatController::class, 'donasikeluarsedekah'])->name('donasikeluarsedekah');
    Route::get('/donasi/keluar/sedekah/form',[ZakatController::class,'formdonasikeluarsedekah'])->name('formdonasikeluarsedekah');
    Route::get('/donasi/keluar/cetak',[ZakatController::class, 'donasikeluarcetak'])->name('donasikeluarcetak');
    Route::post('/donasi/keluar/cetak/detail',[ZakatController::class, 'donasikeluarcetakdetail'])->name('donasikeluarcetakdetail');
});

Route::middleware(['auth','CekLevel:admin'])->group(function () {
    Route::get('/berita',[ZakatController::class, 'berita'])->name('berita');
    Route::get('/zakat/berita/tambah',[ZakatController::class,'tambahberita']);
    Route::post('/zakat/berita/simpan',[ZakatController::class,'simpanberita']);
    Route::get('/zakat/berita/hapus/{id}',[ZakatController::class,'hapusberita'])->name('hapusberita');
    Route::get('/tentang/zakat',[ZakatController::class,'tentangzakat'])->name('tentangzakat');
    Route::get('/tentang/zakat/form',[ZakatController::class,'formzakat']);
    Route::post('/tentang/zakat/simpan',[ZakatController::class, 'zakatsimpan']);
    Route::get('/tentang/zakat/hapus/{id}',[ZakatController::class, 'tentanghapus'])->name('tentanghapus');
    Route::get('/berita/edit/{id}',[ZakatController::class, 'editberita'])->name('editberita');
    Route::post('/berita/edit/simpan',[ZakatController::class, 'editberitaSimpan'])->name('editberitaSimpan');
    Route::get('/tentang/zakat/edit/{id}',[ZakatController::class, 'editzakat'])->name('editzakat');
    Route::post('/tentang/zakat/edit/simpan',[ZakatController::class, 'editzakatSimpan'])->name('editzakatSimpan');
    Route::get('/kitik/saran',[ZakatController::class, 'kitsaran'])->name('kitsaran');
    Route::post('/cetak/semua',[ZakatController::class, 'cetaksemua'])->name('cetaksemua');
});

Route::middleware(['auth', 'CekLevel:user'])->group(function () {
Route::get('/zakat', [ZakatController::class, 'index'])->name('zakat');
Route::get('/histori/donasi',[ZakatController::class, 'histori'])->name('histori');
Route::get('/histori/tabel/donasi',[ZakatController::class, 'historidonasi'])->name('historidonasi');
Route::get('/struck/pembayaran/{id}',[ZakatController::class, 'struck'])->name('struck');
});