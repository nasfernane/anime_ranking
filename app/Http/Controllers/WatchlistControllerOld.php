<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use App\Models\Watchlist;

class WatchlistController extends Controller
{
    // public function index () {
    //     // si l'utilisateur est connecté
    //     if (Auth::check()) {
    //         // récupère sa watchlist
    //         $watchlist = DB::table('watchlists')->where('user_id', Auth::id())->leftjoin('animes', 'animes.id', '=', 'watchlists.anime_id')->get();
    //         // retourne la vue
    //         return view('watchlist', ['watchlist' => $watchlist]);

    //     }

    //     // si l'utilisateur n'est pas connecté, redirige vers la page de connexion
    //     return redirect('/login');
    // }

    // ajout d'un anime dans une playlist
    public function create ($animeId) {
        // si l'utilisateur est connecté
        if (Auth::check()) {
            $animeAlreadyAdded = DB::table('watchlists')->where('user_id', Auth::id())->where('anime_id', $animeId)->exists();
            
            // si l'anime ne fait pas déjà partie de la playlist, on l'ajoute
            if (!$animeAlreadyAdded) {
                $watchlist = new Watchlist();
                $watchlist->user_id = Auth::id();
                $watchlist->anime_id = $animeId;
                $watchlist->save();

                // redirige vers la playlist
                return redirect ('/watchlist');
            }

            // sinon, revient en arrière
            return back();
        }

        // si l'utilisateur n'est pas connecté, redirige vers la page de connexion
        return redirect('/login');
    }

    // suppression d'une watchlist
    public function delete ($animeId) {
        if (Auth::check()) {
            $watchlist = Watchlist::where('user_id', Auth::id())->where('anime_id', $animeId)->get()->first();
            if ($watchlist->exists()) $watchlist->delete();          
            return back();
        }
    }

    
}
