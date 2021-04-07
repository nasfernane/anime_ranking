<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class WatchlistController extends Controller
{
    public function create () {
        DB::insert('INSERT INTO watchlists (anime_id, user_id) VALUES (:anime_id, :user_id)', ['anime_id' => 3, 'user_id' => 2]);

        return back();
    }

    
}
