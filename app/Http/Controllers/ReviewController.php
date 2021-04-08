<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use App\Models\Anime;
use App\Models\User;
use App\Models\Review;

use App\Http\Controllers\AnimeController;

class ReviewController extends Controller
{

    // affiche la page pour écrire une nouvelle review 
    public function newReview (int $animeId) {
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

    // ajout de la review utilisateur
    public function addReview (Request $request, $animeId) {
        // vérification des données entrées en input
        $validated = $request->validate([
            "content" => "required|string",
            "note" => "required|integer",
          ]);

        // ajout d'une review sur la base du modèle
        $review = new Review();
        $review->content = $validated['content'];
        $review->note = $validated['note'];
        $review->anime_id = $animeId;
        $review->user_id = Auth::id();
        $review->user_name = Auth::user()->username;
        $review->save();

        // maj note moyenne sur l'anime
        AnimeController::updateAvgRank($animeId);

        return back();
    }
}