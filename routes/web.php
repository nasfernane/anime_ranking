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
Route::post('signup', [AuthController::class, 'signUp']);
Route::post('signout', [AuthController::class, 'signOut']);

// routes liées aux animes
// Route::get('/', [AnimeController::class, 'getAllAnimes']);
Route::get('/top', [AnimeController::class, 'displayTopAnimes']);
Route::get('/anime/{id}', [AnimeController::class, 'getSpecificAnime']);

// routes liées aux watchlists
Route::get('/watchlist', [WatchlistController::class, 'index']);

// routes liées aux reviews
Route::get('/anime/{id}/new_review', [ReviewController::class, 'newReview']);
Route::post('/anime/{id}/new_review', [ReviewController::class, 'addReview']);





