<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use App\Models\Watchlist;

class WatchlistController extends Controller
{
    public function index () {
        // si l'utilisateur est connecté
        if (Auth::check()) {
            // récupère sa watchlist
            $watchlist = DB::table('watchlists')->where('user_id', Auth::id())->leftjoin('animes', 'animes.id', '=', 'watchlists.anime_id')->get();
            // retourne la vue
            return view('watchlist', ['watchlist' => $watchlist]);

        }

        // si l'utilisateur n'est pas connecté, redirige vers la page de connexion
        return redirect('/login');
    }

    // ajout d'un anime dans une playlist
    public function addToWatchList ($animeId) {
        // si l'utilisateur est connecté
        if (Auth::check()) {
            // création de la playlist
            $watchlist = new Watchlist();
            $watchlist->user_id = Auth::id();
            $watchlist->anime_id = $animeId;
            $watchlist->save();

            // redirige vers la playlist
            return redirect ('/watchlist');
        }

        // si l'utilisateur n'est pas connecté, redirige vers la page de connexion
        return redirect('/login');
    }

    
}
