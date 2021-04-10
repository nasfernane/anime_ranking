<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

use App\Http\Controllers\AnimeController;

use App\Models\Review;
use Database\Seeders\Spintax;
// use Faker;



class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     * 
     * 
     */

     
    public function run()
    {
        // récupère les utilisateurs et animes déjà créés
        $users = DB::table('users')->select('username')->get();
        $animes = DB::table('animes')->select('id')->get();

        // crée une review avec texte et note aléatoire pour chaque utilisateur sur chaque anime présent dans la bdd
        foreach ($users as $key => $user) {
            for ($i = 1; $i <= $animes->count(); $i++) {
                // utilise le générateur de texte pour générer une review aléatoirement
                $spintax = new Spintax();
                // note aléatoire
                $note = rand(1, 10);

                // génère la review en fonction de la note
                switch ($note) {
                    case 10:
                        $randomReview = $spintax->process($spintax->strings['stringPerfect']);
                        break;
                    case 7:
                    case 8:
                    case 9:
                        $randomReview = $spintax->process($spintax->strings['stringTop']);
                        break;
                    case 5:
                    case 6:
                        $randomReview = $spintax->process($spintax->strings['stringMedium']);
                        break;
                    case 3:
                    case 4:
                        $randomReview = $spintax->process($spintax->strings['stringLow']);
                        break;
                    default:
                        $randomReview = $spintax->process($spintax->strings['stringWorst']);
                        break;

                }
                
                $currentReview = new Review();

                $currentReview->fill([
                    'content' => $randomReview,
                    'anime_id' => $i,
                    'user_id' => $key + 1,
                    'user_name' => $user->username,
                    'note' => $note
                ])->save();
            }
        }

        // mise à jour des notes moyennes de tous les animes
        $animeIndexes = range(1, $animes->count());
        AnimeController::updateAvgRank(...$animeIndexes);
    }
}
