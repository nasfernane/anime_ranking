<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use App\Models\Watchlist;

class WatchlistController extends Controller
{
    public function index () {
        if (Auth::check()) {
            $watchlist = DB::table('watchlists')->where('user_id', Auth::id())->leftjoin('animes', 'animes.id', '=', 'watchlists.anime_id')->get();
            return view('watchlist', ['watchlist' => $watchlist]);

        }
        // DB::insert('INSERT INTO watchlists (anime_id, user_id) VALUES (:anime_id, :user_id)', ['anime_id' => 3, 'user_id' => 2]);

        return redirect('/login');
    }

    public function addToWatchList ($animeId) {
        if (Auth::check()) {
            $watchlist = new Watchlist();
            $watchlist->user_id = Auth::id();
            $watchlist->anime_id = $animeId;
            $watchlist->save();

            return redirect ('/watchlist');
        }

        return redirect('/login');
    }

    
}
