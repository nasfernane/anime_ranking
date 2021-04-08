<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AnimeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $animes = [
            1 => [
                'title' => 'Hunter X Hunter',
                'description' => 'Gon rêve de devenir hunter, un aventurier d\'élite. Son père Jin est considéré comme le plus grand hunter de son temps. Gon veut aussi le retrouver.',
                'cover' => 'hunter.jpg',
            ],
            2 => [
                'title' => 'L\'attaque des Titans',
                'description' => 'Dans un monde ravagé par des titans mangeurs d’homme, les rares survivants n’ont d’autre choix pour vivre que de se cloîtrer dans une cité-forteresse.',
                'cover' => 'titans.jpg',
            ],
            3 => [
                'title' => 'Lastman',
                'description' => 'Richard Aldana, boxeur assez paresseux, doit prendre soin de la fille de son coach, assassiné par un ordre mystérieux.',
                'cover' => 'lastman.png'
            ],
            4 => [
                'title' => 'Cowboy Bebop',
                'description' => '2071. Spike Spiegel et Jet Black, chasseurs de primes fauchés, errent dans l\'espace au gré de leurs missions et dans une ambiance plutôt "Seventies".',
                'cover' => 'cowboy.webp',
            ],
            5 => [
                'title' => 'Dragon Ball Z',
                'description' => 'Cinq années se sont écoulées depuis que Songoku a vaincu Satan Petit Coeur Junior. Mais un danger menace la terre. Un guerrier du nom de Raditz.',
                'cover' => 'dbz.webp',
            ],
            6 => [
                'title' => 'Samurai Champloo',
                'description' => 'Fuu est à la recherche du samurai qui sent le tournesol. Après avoir sauvé Mugen et Jin, elle arrive à les convaincre de l\'aider dans sa quête.',
                'cover' => 'samurai.jpg',
            ],
            7 => [
                'title' => 'GTO - Great Teacher Onizuka',
                'description' => 'Onizuka, un ancien loubard, se met en tête de devenir un grand professeur avec sa vision très personnelle de l\'éducation... ',
                'cover' => 'gto.jpg',
            ]
            
        ];

        foreach ($animes as $anime) {
            DB::table('animes')->insert([
                'title' => $anime['title'],
                'description' => $anime['description'],
                'cover' => $anime['cover']
            ]);
        }
    }
}
