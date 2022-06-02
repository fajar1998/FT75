<?php

use App\Http\Controllers\Admin\KategoriController;
use App\Http\Controllers\Admin\ListFIlmController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\User\FavoritController;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
Route::group(['middleware' => 'prevent-back-history'],function(){

Route::get('/', [LandingController::class, 'Index'])->name('landing.guest');

// Route::resource('/',LandingController::class);
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Middleware Admin
Route::group(['middleware' => ['admin']],function(){
    Route::resource('listfilm',ListFIlmController::class);
    Route::resource('kategori',KategoriController::class);
});
// ------------------------------------------
// Middleware User
Route::group(['middleware' => ['user']],function(){
    Route::resource('fav',FavoritController::class);
    });
    // ------------------------------------------
Route::post('film/ratings/{id}', [ListFIlmController::class, 'UbahRating'])->name('rating.ubah');
Route::get('film/rate/{id}', [ListFIlmController::class, 'Rating'])->name('lihat.rating');
Route::get('/admin/logout', [LogoutController::class, 'Logout'])->name('admin.logout');

// End Prevent
});
