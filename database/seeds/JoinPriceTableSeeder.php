<?php

use Illuminate\Database\Seeder;

class JoinPriceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Admin\Join_price::class, 200)->create();
    }
}
