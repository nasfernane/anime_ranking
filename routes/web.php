<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Anime;

use App\Http\Controllers\AnimeController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\WatchlistController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// routes basiques
Route::view('/', 'welcome', ['animes' => Anime::All()]);
Route::view('/login', 'login');
Route::view('/signup', 'signup');

// routes liées à l'authentification
Route::post('/login', [AuthController::class, 'logIn']);
Route::post('/signup', [AuthController::class, 'signUp']);
Route::post('/signout', [AuthController::class, 'signOut']);

// routes liées aux animes
// Route::get('/', [AnimeController::class, 'getAllAnimes']);
Route::get('/top', [AnimeController::class, 'displayTopAnimes']);
Route::get('/anime/{id}', [AnimeController::class, 'getSpecificAnime']);

// routes liées aux watchlists
Route::get('/watchlist', [WatchlistController::class, 'index']);
Route::post('/watchlist/{id}/add', [WatchlistController::class, 'create']);
Route::post('/watchlist/{id}/delete', [WatchlistController::class, 'delete']);

// routes liées aux reviews
Route::get('/review/{id}/create', [ReviewController::class, 'create']);
Route::post('/review/{id}/store', [ReviewController::class, 'store']);
Route::post('/review/{id}/edit', [ReviewController::class, 'edit']);
Route::post('/review/{id}/delete', [ReviewController::class, 'destroy']);
Route::post('/review/{id}/update', [ReviewController::class, 'update']);









