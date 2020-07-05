<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Admin\Join_price;
use Faker\Generator as Faker;
use Illuminate\Support\Str;
use Carbon\Carbon;

$factory->define(Join_price::class, function (Faker $faker) {
    $shopIDs  = App\Admin\Shop::pluck('id')->all();

    $name = [
        '男性',
        '女性',
        '学生',
        'シニア',
    ];

    $price = [
        '10000',
        '12000',
        '11000',
        '15000',
        '20000',
    ];
    
    

    return [
        'shop_id' => $faker->randomElement($shopIDs),
        
        'name' => $faker->randomElement($name),
        'price' => $faker->randomElement($price),
        
        'created_at' => $faker->datetime($max = 'now', $timezone = date_default_timezone_get()),
    ];
});
