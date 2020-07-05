<?php

use Illuminate\Database\Seeder;

class OpenTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Admin\Open::class, 200)->create();
    }
}
