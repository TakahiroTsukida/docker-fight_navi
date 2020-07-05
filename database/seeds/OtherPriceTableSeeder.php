<?php

use Illuminate\Database\Seeder;

class OtherPriceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Admin\Other_price::class, 80)->create();
    }
}
