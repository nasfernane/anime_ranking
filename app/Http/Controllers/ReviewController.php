<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use App\Models\Anime;
use App\Models\User;
use App\Models\Review;

use App\Http\Requests\StoreReview;
use App\Http\Requests\UpdateReview;

use App\Http\Controllers\AnimeController;



class ReviewController extends Controller
{
    
    public function index()
    {
        //
    }

    // affiche le formulaire pour créer une nouvelle review
    public function create(int $animeId)
    {
        // si l'utilisateur est connecté
        if (Auth::check()) {
            // récupère l'anime concerné
            $anime = Anime::find($animeId);
            // vérifie si l'utilisateur a déjà soumis une review
            $review = Review::where('user_id', Auth::id())->where('anime_id', $animeId)->exists();
            // $review = DB::table('reviews')->where(['user_id' => Auth::id(), 'anime_id' => $animeId])->get()->first();

            // en l'absence de review appartenant à l'utilisateur
            if (!$review) {
                // affiche la page
                return view('reviews.create', ["anime" => $anime]);
            } else {
                // sinon, ajoute sa review pour l'afficher à la place de l'input
                return view('reviews.create', ["anime" => $anime, "userReview" => $review]);
            }
        }

        // si l'utilisateur n'est pas connecté, retourne l'erreur
        return back()->withErrors([
            'connexionRequired' => 'Vous devez vous connecter pour ajouter une review',
          ]);
    }

    
    public function store(StoreReview $request, int $animeId)
    {
        // vérifie si l'utilisateur a déjà créé une review pour cet anime
        $reviewExists = Review::where('anime_id', $animeId)->where('user_id', Auth::id())->exists();
        
        // si ce n'est pas le cas, on la crée
        if (!$reviewExists) {
            // création d'une review avec mass assignement et validation des saisies utilisateurs
            Review::make($request->validated())->fill(['anime_id' => $animeId, 'user_id' => Auth::id(), 'user_name' => Auth::user()->username])->save();
            // message flash dans la session pour avertir l'utilisateur
            $request->session()->flash('status-success', 'Votre review a été ajoutée');

            // maj note moyenne sur l'anime
            AnimeController::updateAvgRank($animeId);

            // redirige vers la page de l'anime
            return redirect (route('animes.show', ['id' => $animeId]));
        }

        // sinon, on redirige vers l'anime
        return redirect (route('animes.show', ['id' => $animeId]));
        
    }
 
    public function edit($id)
    {
        // récupération de la review et de l'anime correspondant
        $review = Review::find($id);
        $anime = Anime::find($review->anime_id);

        // si la review appartient à l'utilisateur connecté
        if ($review->user_id === Auth::id()) {
            // retourne la vue d'édition avec les informations
            return view('reviews.edit', ['userReview' => $review, 'anime' => $anime]);
        }

        // sinon, redirige vers la page d'accueil
        return redirect ('/');
    }

    
    public function update(UpdateReview $request, $id)
    {
        // requête Eloquent pour chercher une critique par son identifiant, renvoie erreur 404 en cas d'échec
        $review = Review::findOrFail($id);

        // vérification des données entrées en input
        $validated = $request->validated();

        // Mise à jour de la review
        $review->fill($validated);
        $review->save();
        $request->session()->flash('status-success', 'Votre review a été mise à jour.');

        // maj note moyenne sur l'anime
        AnimeController::updateAvgRank($review->anime_id);

        // redirige vers la page de l'anime
        return redirect(route('animes.show', ['id' => $review->anime_id]));
    }

    
    public function destroy(Request $request, $id)
    {
        // récupération de la review
        $review = Review::findOrFail($id);
        // si la review appartient à l'utilisateur connecté
        if ($review->user_id === Auth::id()) {
            // supprime la review et revient sur la page de l'anime 
            $review->delete();
            $request->session()->flash('status-error', 'Votre review a été supprimée');
            return back();
        }

        // sinon, redirige vers la page d'accueil
        return redirect ('/');
    }
}
