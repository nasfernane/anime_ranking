<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AnimeController;
use App\Models\Watchlist;

class WatchlistController extends Controller
{
    
    public function index()
    {
        // récupère sa watchlist
        $watchlist = Watchlist::where('user_id', Auth::id())->rightjoin('animes', 'animes.id', '=', 'watchlists.anime_id')->select('watchlists.id as watchlist_id', 'animes.*', 'watchlists.created_at')->get();

        // ajoute le détail des notes sur chaque anime
        foreach ($watchlist as $anime) {
            $anime = AnimeController::addOverallRanks($anime);               
        }
        
        // retourne la vue
        return view('watchlists.index', ['watchlist' => $watchlist]); 
    }

    
    public function store($animeId)
    {   
        $animeAlreadyAdded = Watchlist::where('user_id', Auth::id())->where('anime_id', $animeId)->exists();
        
        // si l'anime ne fait pas déjà partie de la playlist, on l'ajoute
        if (!$animeAlreadyAdded) {
            $watchlist = new Watchlist();
            $watchlist->fill(['user_id' => Auth::id(), 'anime_id' => $animeId])->save();

            // redirige vers la playlist
            return redirect (route('watchlist.index'));
        }

        // sinon, revient en arrière
        return back();
    }


    public function destroy($id)
    {   
        // récupère la watchlist
        $watchlist = Watchlist::where('user_id', Auth::id())->where('anime_id', $id)->get()->first();
        // et la supprime si elle existe et appartient à l'utilisateur connecté
        if ($watchlist->exists()) $watchlist->delete();          
        return back();  
    }
}
