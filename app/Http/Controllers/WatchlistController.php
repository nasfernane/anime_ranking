<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use App\Http\Requests\StoreWatchlist;

use App\Models\Watchlist;

class WatchlistController extends Controller
{
    
    public function index()
    {
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


    public function create()
    {
        //
    }

    
    public function store(Request $request, $animeId)
    {
        // si l'utilisateur est connecté
        if (Auth::check()) {
            $animeAlreadyAdded = Watchlist::where('user_id', Auth::id())->where('anime_id', $animeId)->exists();
            
            // si l'anime ne fait pas déjà partie de la playlist, on l'ajoute
            if (!$animeAlreadyAdded) {
                $watchlist = new Watchlist();
                $watchlist->fill(['user_id' => Auth::id(), 'anime_id' => $animeId])->save();

                // redirige vers la playlist
                return redirect ('/watchlist/index');
            }

            // sinon, revient en arrière
            return back();
        }

        // si l'utilisateur n'est pas connecté, redirige vers la page de connexion
        return redirect('/login');
       
        
    }

    
    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
        //
    }

    
    public function update(Request $request, $id)
    {
        //
    }

    
    public function destroy($id)
    {
        if (Auth::check()) {
            $watchlist = Watchlist::where('user_id', Auth::id())->where('anime_id', $id)->get()->first();
            if ($watchlist->exists()) $watchlist->delete();          
            return back();
        }
    }
}
