<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AnimeController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\WatchlistController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// index
Route::get('/', [AnimeController::class, 'index'])->name('index');

// routes liées à l'authentification
Route::view('/login', 'auth.login')->name('login');
Route::view('/signup', 'auth.signup')->name('signup');
Route::post('/login', [AuthController::class, 'logIn']);
Route::post('/signup', [AuthController::class, 'signUp']);
Route::post('/signout', [AuthController::class, 'signOut']);

// routes liées aux animes
Route::prefix('/animes')->name('animes.')->group(function () {
    Route::get('/', [AnimeController::class, 'index'])->name('index');
    Route::get('/top', [AnimeController::class, 'displayTop'])->name('top');
    Route::get('/{id}', [AnimeController::class, 'show'])->name('show');
});

// routes liées aux watchlists
Route::prefix('/watchlist')->name('watchlist.')->middleware('auth')->group(function () {
    Route::get('/index', [WatchlistController::class, 'index'])->name('index');
    Route::post('/{id}/store', [WatchlistController::class, 'store'])->name('store');
    Route::delete('/{id}/destroy', [WatchlistController::class, 'destroy'])->name('destroy');
});

// routes liées aux reviews
Route::prefix('/review')->name('review.')->middleware('auth')->group(function () {
    Route::get('/{id}/create', [ReviewController::class, 'create'])->name('create');
    Route::post('/{id}/store', [ReviewController::class, 'store'])->name('store');
    Route::post('/{id}/edit', [ReviewController::class, 'edit'])->name('edit');
    Route::delete('/{id}/delete', [ReviewController::class, 'destroy'])->name('destroy');
    Route::put('/{id}/update', [ReviewController::class, 'update'])->name('update');
});













