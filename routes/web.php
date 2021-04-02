<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;

use App\Http\Controllers\AnimeController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// routes basiques
Route::view('/login', 'login');
Route::view('/signup', 'signup');

// routes liées à l'authentification
Route::post('/login', [AuthController::class, 'logIn']);
Route::post('signup', [AuthController::class, 'signUp']);
Route::post('signout', [AuthController::class, 'signOut']);

// routes liées aux animes
Route::get('/', [AnimeController::class, 'getAllAnimes']);
Route::get('/anime/{id}', [AnimeController::class, 'getSpecificAnime']);

// routes liées aux reviews
Route::get('/anime/{id}/new_review', [ReviewController::class, 'newReview']);
Route::post('/anime/{id}/new_review', [ReviewController::class, 'addReview']);


