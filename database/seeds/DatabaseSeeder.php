<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
      $this->call([
          // TypesTableSeeder::class,
          // UserSeeder::class,
          AdminsTableSeeder::class,
          // ShopsTableSeeder::class,
          // ReviewsTableSeeder::class,
          // FavoritesTableSeeder::class,

      ]);
    }
}
