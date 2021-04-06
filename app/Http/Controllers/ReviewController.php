<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    // affiche la page pour écrire une nouvelle review 
    public function newReview ($animeId) {
        // si l'utilisateur est connecté
        if (Auth::check()) {
            $userId = Auth::id();

            $review = DB::select("SELECT * FROM reviews WHERE user_id = ? && anime_id = ?", [$userId, $animeId]);
            // récupère l'anime concerné
            $anime = DB::select("SELECT * FROM animes WHERE id = ?", [$animeId])[0];
            
            if (!isset($review[0])) {
                // affiche la page
                return view('new_review', ["anime" => $anime]);
            } else {
                return view('new_review', ["anime" => $anime, "userReview" => $review[0]]);
            }
            
        }

        return back()->withErrors([
            'reviewconnexion' => 'Vous devez vous connecter pour ajouter une critique',
          ]);

    }

    public function addReview (Request $request, $animeId) {
        dd(Auth::user()->username);
        $validated = $request->validate([
            "content" => "required|string",
            "note" => "required|integer",
          ]);
        
        DB::insert('INSERT INTO reviews (content, anime_id, user_id, note)
                    VALUES (:content, :anime_id, :user_id, :note)', ['content' => $validated['content'],
                     'anime_id' => $animeId, 
                     'user_id' => Auth::id(),
                     'note' => $validated['note']
                    ]);

        return back();
    }
}