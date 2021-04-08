<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Expr\Cast\Object_;
use SebastianBergmann\Type\NullType;

use App\Models\Anime;

class AnimeController extends Controller
{
    // mise à jour de la note moyenne d'un ou plusieurs animes
    static function updateAvgRank (...$animeIds) {
        foreach ($animeIds as $id) {
            // mise à jour de la note moyenne d'un anime
            $avg_rank = DB::table('reviews')->where('anime_id', '=', $id)->get()->avg('note');
            DB::table('animes')->where('id', $id)->update(['avgRank' => $avg_rank]);
        }
    }

    // affichage des animes selon leur note moyenne
    public function displayTopAnimes () {
        // récupère tous les animes triés par note moyenne en ordre décroissant
        $animes = DB::table('animes')->orderBy('avgRank', 'desc')->get();
        return view('top', ['animes' => $animes]);
    }

    // affichage d'un anime
    public function getSpecificAnime ($id) {
        // récupère l'anime selon l'id entré en paramètre dans l'url, avec les reviews qui lui sont associées
        $reviews = DB::table('animes')->where('animes.id', $id)->leftjoin('reviews', 'reviews.anime_id', '=', 'animes.id')->get();
        $anime = $reviews->first();
        $anime->id = $anime->anime_id;
        

        // si on obtient au moins un résultat
        if (isset($reviews[0])) {
            // si l'anime dispose d'au moins une review
            if ($reviews[0]->content !== Null) {
                // pour chaque review
                foreach ($reviews as $key => $review) {
                    // si elle appartient à l'utilisateur connecté
                    if ($review->user_id === Auth::id()) {
                        // sépare la review de l'utilisateur des autres
                        $userReview = $review;
                        unset($reviews[$key]);

                        // et on retourne la vue avec les reviews des autres utilisateurs, la review de l'utilisateur connecté et les informations sur l'anime
                        return view('anime', ["reviews" => $reviews, "userReview" => $userReview, "anime" => $anime]);
                    }
                }
                
                // si aucune review n'appartient à l'utilisateur, on renvoie les informations sur l'anime et toutes les reviews
                return view('anime', ["reviews" => $reviews, "anime" => $anime]);
            }

            // si l'anime ne dispose pas de review, on renvoie seulement les informations sur l'anime
            $anime['id'] = $id;
            return view('anime', ["anime" => $anime]);
            
        }
        // si l'id ne correspond à aucun anime, on renvoie vers la page d'accueuil
        return redirect ('/');
        
    }

}