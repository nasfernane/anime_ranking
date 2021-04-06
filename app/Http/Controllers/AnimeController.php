<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Expr\Cast\Object_;
use SebastianBergmann\Type\NullType;

class AnimeController extends Controller
{
    public function getAllAnimes () {
        $animes = DB::select("SELECT * FROM animes");
        return view('welcome', ["animes" => $animes]);
    }

    public function getSpecificAnime ($id) {
        // récupère l'anime selon l'id entré en paramètre dans l'url, avec les reviews qui lui sont associées
        $reviews = DB::select('
            SELECT animes.*, reviews.*
            FROM animes
            LEFT JOIN reviews
            ON reviews.anime_id = animes.id
            WHERE animes.id = ?', [$id]);

        // si on obtient au moins un résultat
        if (isset($reviews[0])) {
            // récupère les infos de l'anime dans un tableau à part pour gérer le template plus proprement
            [$anime['title'], $anime['description'], $anime['cover'], $anime['id']] = [$reviews[0]->title, $reviews[0]->description, $reviews[0]->cover, $reviews[0]->id];

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
            return view('anime', ["anime" => $anime]);
        }
        // si l'id ne correspond à aucun anime, on renvoie vers la page d'accueuil
        return redirect ('/');
        
    }
}