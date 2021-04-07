<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

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

        $avg_rank1 = round(collect(DB::select('
            SELECT reviews.note 
            FROM reviews
            WHERE reviews.anime_id = ?', [1]
        ))->avg('note'), 1);

        DB::update("UPDATE animes
                    SET avgRank = $avg_rank1
                    WHERE id = 1");

        $avg_rank2 = round(collect(DB::select('
        SELECT reviews.note 
        FROM reviews
        WHERE reviews.anime_id = ?', [2]
        ))->avg('note'), 1);

        DB::update("UPDATE animes
                SET avgRank = $avg_rank2
                WHERE id = 2");

        $avg_rank3 = round(collect(DB::select('
        SELECT reviews.note 
        FROM reviews
        WHERE reviews.anime_id = ?', [3]
        ))->avg('note'), 1);

        DB::update("UPDATE animes
                SET avgRank = $avg_rank3
                WHERE id = 3");

        $avg_rank4 = round(collect(DB::select('
        SELECT reviews.note 
        FROM reviews
        WHERE reviews.anime_id = ?', [4]
        ))->avg('note'), 1);

        DB::update("UPDATE animes
                SET avgRank = $avg_rank4
                WHERE id = 4");

        $avg_rank5 = round(collect(DB::select('
        SELECT reviews.note 
        FROM reviews
        WHERE reviews.anime_id = ?', [5]
        ))->avg('note'), 1);

        DB::update("UPDATE animes
                SET avgRank = $avg_rank5
                WHERE id = 5");

        $avg_rank6 = round(collect(DB::select('
        SELECT reviews.note 
        FROM reviews
        WHERE reviews.anime_id = ?', [6]
        ))->avg('note'), 1);

        DB::update("UPDATE animes
                SET avgRank = $avg_rank6
                WHERE id = 6");

        $avg_rank7 = round(collect(DB::select('
        SELECT reviews.note 
        FROM reviews
        WHERE reviews.anime_id = ?', [7]
        ))->avg('note'), 1);

        DB::update("UPDATE animes
                SET avgRank = $avg_rank7
                WHERE id = 7");
    }
}
