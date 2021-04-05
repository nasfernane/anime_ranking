<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class AnimeController extends Controller
{
    public function getAllAnimes () {
        $animes = DB::select("SELECT * FROM animes");
        return view('welcome', ["animes" => $animes]);
    }

    public function getSpecificAnime ($id) {
        $anime = DB::select("SELECT * FROM animes WHERE id = ?", [$id])[0];

        // si l'utilisateur est connecté, vérifie si il a déjà ajouté une review
        if (Auth::check()) {
            $userReview = DB::select('SELECT * FROM reviews WHERE user_id = ? && anime_id = ?', [Auth::id(), $id]);
            
            // si c'est le cas, affiche la page d'anime avec la review existante
            if (isset($userReview[0])) {
                return view('anime', ["anime" => $anime, "userReview" => $userReview[0]]);
            }
        }
        

        return view('anime', ["anime" => $anime]);
    }
}