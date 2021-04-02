<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AnimeController extends Controller
{
    public function getAllAnimes () {
        $animes = DB::select("SELECT * FROM animes");
        return view('welcome', ["animes" => $animes]);
    }

    public function getSpecificAnime ($id) {
        $anime = DB::select("SELECT * FROM animes WHERE id = ?", [$id])[0];
        return view('anime', ["anime" => $anime]);
    }
}