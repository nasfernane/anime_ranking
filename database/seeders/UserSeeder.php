<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       
        DB::table('users')->insert([
            'username' => 'Sangoku',
            'password' => Hash::make('password')
        ]);
        DB::table('users')->insert([
          'username' => 'Vegeta',
          'password' => Hash::make('password')
        ]);
        DB::table('users')->insert([
          'username' => 'Sangohan',
          'password' => Hash::make('password')
        ]);
        DB::table('users')->insert([
          'username' => 'Krilin',
          'password' => Hash::make('password')
        ]);
        DB::table('users')->insert([
          'username' => 'Tortue Géniale',
          'password' => Hash::make('password')
        ]);
        DB::table('users')->insert([
          'username' => 'Yamcha',
          'password' => Hash::make('password')
        ]);
    }
}
