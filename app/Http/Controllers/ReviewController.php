<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReviewController extends Controller
{
    public function newReview ($id) {
        $anime = DB::select("SELECT * FROM animes WHERE id = ?", [$id])[0];
        return view('new_review', ["anime" => $anime]);
    }
}