<?php

use Illuminate\Database\Seeder;

class User/ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $type = new \App\User\Review([
        'name' => 'ボクシング',
        ]);
        $type->save();
    }
}
