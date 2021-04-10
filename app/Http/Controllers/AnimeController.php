<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Expr\Cast\Object_;
use SebastianBergmann\Type\NullType;

use App\Models\Anime;
use App\Models\Review;

class AnimeController extends Controller
{
    // mise à jour de la note moyenne d'un ou plusieurs animes
    static function updateAvgRank (...$animeIds) {
        foreach ($animeIds as $id) {
            // mise à jour de la note moyenne d'un anime
            $avg_rank = DB::table('reviews')->where('anime_id', '=', $id)->get()->avg('note');
            // dd($avg_rank);
            DB::table('animes')->where('id', $id)->update(['avgRank' => $avg_rank]);
        }
    }

    // ajoute vision globale des notes à un anime
    static function addOverallRanks ($anime) {
            $overallRanks = [];
            $reviews = DB::table('reviews')->where('anime_id', $anime->id)->get()->groupBy('note');
            foreach ($reviews as $review) {
                $overallRanks[$review->first()->note] = $review->count();
            }
            // trie le tableau par ordre numérique naturel
            ksort($overallRanks, SORT_NATURAL);
            // ajoute le tableau à l'anime
            $anime->overallRanks = $overallRanks;
        

        // retourne la collection
        return $anime;
    }

    // affiche tous les animes dans la page principale
    public function index () {
        return view('welcome', ['animes' => Anime::All()]);
    }

    // affichage des animes selon leur note moyenne
    public function displayTop () {
        // récupère tous les animes triés par note moyenne en ordre décroissant
        $animes = Anime::orderBy('avgRank', 'desc')->get();

        // ajoute le détail des notes sur chaque anime
        foreach ($animes as $anime) {
            $anime = $this->addOverallRanks($anime);
        }
        
        return view('top', ['animes' => $animes]);
    }

    // affichage d'un anime
    public function show ($id) {
        // récupère l'anime et ridirige si il n'existe pas
        $anime = Anime::find($id);
        if (!$anime) return redirect ('/');

        // ajoute l'overview des notes sur l'anime
        $anime = $this->addOverallRanks($anime);
        // récupère ses reviews
        $reviews = Review::where('anime_id', $anime->id)->get();  

        
        // si l'anime dispose d'au moins une review
        if (isset($reviews[0]) && $reviews[0]->content !== Null) {
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

}