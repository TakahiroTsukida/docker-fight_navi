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
      // $types = App\Admin\Type::all();

      // factory(App\Admin\Shop::class, 100)
      //       ->create()
      //       ->each(function ($shop) use ($types) {
      //           $shop->types()->attach(
      //               $types->random(rand(1,3))->pluck('id')->toArray()
      //           );
      //       });



      $this->call([
          // TypesTableSeeder::class,
          // UserSeeder::class,
          // AdminsTableSeeder::class,
          // ShopsTableSeeder::class,
          // ReviewsTableSeeder::class,
          // FavoritesTableSeeder::class,
          JoinPriceTableSeeder::class,
          OpenTableSeeder::class,
          OtherPriceTableSeeder::class,
          PriceTableSeeder::class,
      ]);
    }
}
