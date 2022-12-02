<?php


use App\Http\Controllers\UserController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\PostinganController;
use App\Http\Controllers\RekomendasiController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


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

Route::get('/', [PostinganController::class, 'beranda'])->name('beranda');
Route::get('/detailberanda', [PostinganController::class, 'detailberanda'])->name('detailberanda');

Route::resource('/rekomendasi', RekomendasiController::class);
Route::post('rekom', [RekomendasiController::class,'pasien'])->name('rekom');

Auth::routes();
Route::resource('user', UserController::class);
Route::resource('produk', ProdukController::class);
Route::resource('kategori', KategoriController::class);
Route::resource('postingan', PostinganController::class);



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
