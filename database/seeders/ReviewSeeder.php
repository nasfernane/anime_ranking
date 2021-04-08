<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

use App\Http\Controllers\AnimeController;


class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('reviews')->insert([
            'content' => Str::random(60),
            'anime_id' => 1,
            'user_id' => 1,
            'user_name' => 'Sangoku',
            'note' => rand(1, 10)
        ]);
        DB::table('reviews')->insert([
            'content' => Str::random(30),
            'anime_id' => 1,
            'user_id' => 2,
            'user_name' => 'Vegeta',
            'note' => rand(1, 10)
        ]);
        DB::table('reviews')->insert([
            'content' => Str::random(50),
            'anime_id' => 1,
            'user_id' => 3,
            'user_name' => 'Sangohan',
            'note' => rand(1, 10)
        ]);
        DB::table('reviews')->insert([
            'content' => Str::random(20),
            'anime_id' => 1,
            'user_id' => 4,
            'user_name' => 'Krilin',
            'note' => rand(1, 10)
        ]);
        DB::table('reviews')->insert([
            'content' => Str::random(40),
            'anime_id' => 1,
            'user_id' => 5,
            'user_name' => 'Tortue Géniale',
            'note' => rand(1, 10)
        ]);
        DB::table('reviews')->insert([
            'content' => Str::random(60),
            'anime_id' => 1,
            'user_id' => 6,
            'user_name' => 'Yamcha',
            'note' => rand(1, 10)
        ]);

        DB::table('reviews')->insert([
            'content' => Str::random(60),
            'anime_id' => 2,
            'user_id' => 1,
            'user_name' => 'Sangoku',
            'note' => rand(1, 10)
        ]);
        DB::table('reviews')->insert([
            'content' => Str::random(30),
            'anime_id' => 2,
            'user_id' => 2,
            'user_name' => 'Vegeta',
            'note' => rand(1, 10)
        ]);
        DB::table('reviews')->insert([
            'content' => Str::random(50),
            'anime_id' => 2,
            'user_id' => 3,
            'user_name' => 'Sangohan',
            'note' => rand(1, 10)
        ]);
        DB::table('reviews')->insert([
            'content' => Str::random(20),
            'anime_id' => 2,
            'user_id' => 4,
            'user_name' => 'Krilin',
            'note' => rand(1, 10)
        ]);
        DB::table('reviews')->insert([
            'content' => Str::random(40),
            'anime_id' => 2,
            'user_id' => 5,
            'user_name' => 'Tortue Géniale',
            'note' => rand(1, 10)
        ]);
        DB::table('reviews')->insert([
            'content' => Str::random(60),
            'anime_id' => 2,
            'user_id' => 6,
            'user_name' => 'Yamcha',
            'note' => rand(1, 10)
        ]);

        // =

        DB::table('reviews')->insert([
            'content' => Str::random(60),
            'anime_id' => 3,
            'user_id' => 1,
            'user_name' => 'Sangoku',
            'note' => rand(1, 10)
        ]);
        DB::table('reviews')->insert([
            'content' => Str::random(30),
            'anime_id' => 3,
            'user_id' => 2,
            'user_name' => 'Vegeta',
            'note' => rand(1, 10)
        ]);
        DB::table('reviews')->insert([
            'content' => Str::random(50),
            'anime_id' => 3,
            'user_id' => 3,
            'user_name' => 'Sangohan',
            'note' => rand(1, 10)
        ]);
        DB::table('reviews')->insert([
            'content' => Str::random(20),
            'anime_id' => 3,
            'user_id' => 4,
            'user_name' => 'Krilin',
            'note' => rand(1, 10)
        ]);
        DB::table('reviews')->insert([
            'content' => Str::random(40),
            'anime_id' => 3,
            'user_id' => 5,
            'user_name' => 'Tortue Géniale',
            'note' => rand(1, 10)
        ]);
        DB::table('reviews')->insert([
            'content' => Str::random(60),
            'anime_id' => 3,
            'user_id' => 6,
            'user_name' => 'Yamcha',
            'note' => rand(1, 10)
        ]);

        // =

        DB::table('reviews')->insert([
            'content' => Str::random(60),
            'anime_id' => 4,
            'user_id' => 1,
            'user_name' => 'Sangoku',
            'note' => rand(1, 10)
        ]);
        DB::table('reviews')->insert([
            'content' => Str::random(30),
            'anime_id' => 4,
            'user_id' => 2,
            'user_name' => 'Vegeta',
            'note' => rand(1, 10)
        ]);
        DB::table('reviews')->insert([
            'content' => Str::random(50),
            'anime_id' => 4,
            'user_id' => 3,
            'user_name' => 'Sangohan',
            'note' => rand(1, 10)
        ]);
        DB::table('reviews')->insert([
            'content' => Str::random(20),
            'anime_id' => 4,
            'user_id' => 4,
            'user_name' => 'Krilin',
            'note' => rand(1, 10)
        ]);
        DB::table('reviews')->insert([
            'content' => Str::random(40),
            'anime_id' => 4,
            'user_id' => 5,
            'user_name' => 'Tortue Géniale',
            'note' => rand(1, 10)
        ]);
        DB::table('reviews')->insert([
            'content' => Str::random(60),
            'anime_id' => 4,
            'user_id' => 6,
            'user_name' => 'Yamcha',
            'note' => rand(1, 10)
        ]);

        // =

        DB::table('reviews')->insert([
            'content' => Str::random(60),
            'anime_id' => 5,
            'user_id' => 1,
            'user_name' => 'Sangoku',
            'note' => rand(1, 10)
        ]);
        DB::table('reviews')->insert([
            'content' => Str::random(30),
            'anime_id' => 5,
            'user_id' => 2,
            'user_name' => 'Vegeta',
            'note' => rand(1, 10)
        ]);
        DB::table('reviews')->insert([
            'content' => Str::random(50),
            'anime_id' => 5,
            'user_id' => 3,
            'user_name' => 'Sangohan',
            'note' => rand(1, 10)
        ]);
        DB::table('reviews')->insert([
            'content' => Str::random(20),
            'anime_id' => 5,
            'user_id' => 4,
            'user_name' => 'Krilin',
            'note' => rand(1, 10)
        ]);
        DB::table('reviews')->insert([
            'content' => Str::random(40),
            'anime_id' => 5,
            'user_id' => 5,
            'user_name' => 'Tortue Géniale',
            'note' => rand(1, 10)
        ]);
        DB::table('reviews')->insert([
            'content' => Str::random(60),
            'anime_id' => 5,
            'user_id' => 6,
            'user_name' => 'Yamcha',
            'note' => rand(1, 10)
        ]);

        // - 

        DB::table('reviews')->insert([
            'content' => Str::random(60),
            'anime_id' => 6,
            'user_id' => 1,
            'user_name' => 'Sangoku',
            'note' => rand(1, 10)
        ]);
        DB::table('reviews')->insert([
            'content' => Str::random(30),
            'anime_id' => 6,
            'user_id' => 2,
            'user_name' => 'Vegeta',
            'note' => rand(1, 10)
        ]);
        DB::table('reviews')->insert([
            'content' => Str::random(50),
            'anime_id' => 6,
            'user_id' => 3,
            'user_name' => 'Sangohan',
            'note' => rand(1, 10)
        ]);
        DB::table('reviews')->insert([
            'content' => Str::random(20),
            'anime_id' => 6,
            'user_id' => 4,
            'user_name' => 'Krilin',
            'note' => rand(1, 10)
        ]);
        DB::table('reviews')->insert([
            'content' => Str::random(40),
            'anime_id' => 6,
            'user_id' => 5,
            'user_name' => 'Tortue Géniale',
            'note' => rand(1, 10)
        ]);
        DB::table('reviews')->insert([
            'content' => Str::random(60),
            'anime_id' => 6,
            'user_id' => 6,
            'user_name' => 'Yamcha',
            'note' => rand(1, 10)
        ]);

        // - 

        DB::table('reviews')->insert([
            'content' => Str::random(60),
            'anime_id' => 7,
            'user_id' => 1,
            'user_name' => 'Sangoku',
            'note' => rand(1, 10)
        ]);
        DB::table('reviews')->insert([
            'content' => Str::random(30),
            'anime_id' => 7,
            'user_id' => 2,
            'user_name' => 'Vegeta',
            'note' => rand(1, 10)
        ]);
        DB::table('reviews')->insert([
            'content' => Str::random(50),
            'anime_id' => 7,
            'user_id' => 3,
            'user_name' => 'Sangohan',
            'note' => rand(1, 10)
        ]);
        DB::table('reviews')->insert([
            'content' => Str::random(20),
            'anime_id' => 7,
            'user_id' => 4,
            'user_name' => 'Krilin',
            'note' => rand(1, 10)
        ]);
        DB::table('reviews')->insert([
            'content' => Str::random(40),
            'anime_id' => 7,
            'user_id' => 5,
            'user_name' => 'Tortue Géniale',
            'note' => rand(1, 10)
        ]);
        DB::table('reviews')->insert([
            'content' => Str::random(60),
            'anime_id' => 7,
            'user_id' => 6,
            'user_name' => 'Yamcha',
            'note' => rand(1, 10)
        ]);

        // mise à jour des notes moyennes
        AnimeController::updateAvgRank(1, 2, 3, 4, 5, 6, 7);
    }
}
