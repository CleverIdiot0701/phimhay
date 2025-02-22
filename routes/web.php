<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\EpisodeController;
use App\Http\Controllers\LeechMovieController;
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




Route::get('/',[IndexController::class, 'home'])->name('homepage');

Route::get('/danh-muc/{slug}',[IndexController::class, 'category'])->name('category');
Route::get('/the-loai/{slug}',[IndexController::class, 'genre'])->name('genre');
Route::get('/quoc-gia/{slug}',[IndexController::class, 'country'])->name('country');

Route::get('/phim/{slug}',[IndexController::class, 'movie'])->name('movie');
Route::get('/xem-phim/{slug}/{tap}',[IndexController::class, 'watch'])->name('watch');
Route::get('/so-tap',[IndexController::class, 'episode'])->name('so-tap');
Route::get('/nam/{year}',  [IndexController::class, 'year']);
Route::get('/tag/{tag}',  [IndexController::class, 'tag']);






Route::get('/home', [HomeController::class, 'index'])->name('home');
// route admin

Route::post('resorting',  [CategoryController::class, 'resorting'])->name('resorting');

Route::resource('/category', CategoryController::class );
Route::resource('/genre', GenreController::class );
Route::resource('/country', CountryController::class);
// Them tap phim
Route::resource('/episode', EpisodeController::class);
Route::post('/select-movie', [EpisodeController::class, 'select_movie']);




Route::resource('/movie', MovieController::class);

Route::post('/update-year-phim',  [MovieController::class, 'update_year']);
Route::get('/update-topview-phim',  [MovieController::class, 'update_topview']);
Route::post('/filter-topview-phim',  [MovieController::class, 'filter_topview']);
Route::post('/update-season-phim',  [MovieController::class, 'update_season']);

Route::get('/filter-topview-default',  [MovieController::class, 'filter_defalut']);
Route::get('/search',  [IndexController::class, 'search'])->name('search');



Auth::routes();

// route leech movie

Route::get('leech-movie', [LeechMovieController::class, 'leech_movie'])->name('leech-movie');