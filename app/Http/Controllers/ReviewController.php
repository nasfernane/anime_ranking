<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use App\Models\Anime;
use App\Models\User;

class ReviewController extends Controller
{
    // affiche la page pour écrire une nouvelle review 
    public function newReview ($animeId) {
        // si l'utilisateur est connecté
        if (Auth::check()) {
            // récupère l'anime concerné
            $anime = DB::table('animes')->where('animes.id', $animeId)->get()->first();

            // vérifie si l'utilisateur a déjà soumis une review
            $review = DB::table('reviews')->where(['user_id' => Auth::id(), 'anime_id' => $animeId])->get()->first();

            // en l'absence de review appartenant à l'utilisateur
            if (!$review) {
                // affiche la page
                return view('new_review', ["anime" => $anime]);
            } else {
                // sinon, ajoute sa review pour l'afficher à la place de l'input
                return view('new_review', ["anime" => $anime, "userReview" => $review]);
            }
        }

        return back()->withErrors([
            'reviewconnexion' => 'Vous devez vous connecter pour ajouter une review',
          ]);

    }

    public function addReview (Request $request, $animeId) {
        $validated = $request->validate([
            "content" => "required|string",
            "note" => "required|integer",
          ]);
        
        DB::insert('INSERT INTO reviews (content, anime_id, user_id, note, user_name)
            VALUES (:content, :anime_id, :user_id, :note, :user_name)', ['content' => $validated['content'],
                'anime_id' => $animeId, 
                'user_id' => Auth::id(),
                'note' => $validated['note'],
                'user_name' => Auth::user()->username
            ]);

        // calcul de la note moyenne, arrondie sur la première décimale
        $avg_rank = round(collect(DB::select('
            SELECT reviews.note 
            FROM reviews
            WHERE reviews.anime_id = ?', [$animeId]
        ))->avg('note'), 1);

        DB::update("UPDATE animes
                    SET avgRank = $avg_rank
                    WHERE id = $animeId");

        return back();
    }
}