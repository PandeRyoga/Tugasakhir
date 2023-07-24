<?php

use App\Http\Controllers\ArtikelController;
use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\homeController;
use App\Http\Controllers\DashboardController; 
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\SekretariatController;
use App\Http\Controllers\AlbumController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\FrontendController;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//Route::get('/', function () {
  //  return view('welcome');
//});

Route::get('/', [FrontendController::class, 'index'])->name('home');

Route::get('/artikel-detail/{slug}', [FrontendController::class, 'detail'])->name('artikel-detail');

Route::get('/artikel-kategori/{id}', [FrontendController::class, 'artikel_kategori'])->name('artikel-kategori');

Route::get('/album-index', [FrontendController::class, 'album_index'])->name('album-index');

Route::get('/album-detail/{id}', [FrontendController::class, 'album_detail'])->name('album-detail');

Route::get('/tentang-index', [FrontendController::class, 'tentang_index'])->name('tentang-index');


Route::group(['middleware' =>['auth','level:admin']], function(){
    Route::resource('sekretariat', SekretariatController::class);
});
Route::group(['middleware' =>['auth','level:penulis,admin']], function(){
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('kategori', KategoriController::class);
    Route::resource('artikel', ArtikelController::class);
    Route::resource('album', AlbumController::class);
    Route::resource('gallery', GalleryController::class);
});



Auth::routes();





