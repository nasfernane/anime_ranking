<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\Models\Watchlist;
use App\Models\User;
use App\Models\Anime;

class WatchlistTest extends TestCase
{
    use RefreshDatabase;

    public function test_seeRedirectIfUserNotLogged() 
    {
        // texte l'accès à l'index de la watchlist
        $response = $this->get('/watchlist/index');

        // vérifie si l'utilisateur obtient une réponse 302 (redirection)
        $response->assertStatus(302);
    }

    public function test_watchlistWorkingCorrectly() 
    {
        // création d'un utilisateur et d'un anime pour le test
        User::factory()->count(1)->create();
        $anime = Anime::make();

        // ajoute une watchlist sur ces ids
        $watchlist = new Watchlist();
        $watchlist->user_id = 1;
        $watchlist->anime_id = 1;
        $watchlist->save();

        // vérifie que la watchlist a bien été ajoutée en bdd
        $this->assertDatabaseHas('watchlists', [
            'anime_id' => 1,
            'user_id' => 1
        ]);

        // vérifie que la redirection se fait correctement si l'utilisateur n'est pas connecté
        $response = $this->get('/watchlist/index');
        $response->assertRedirect('/login');

    }
}
