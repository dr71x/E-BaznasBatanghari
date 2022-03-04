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
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');
});
