<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Admin\Price;
use Faker\Generator as Faker;
use Illuminate\Support\Str;
use Carbon\Carbon;

$factory->define(Price::class, function (Faker $faker) {
    $shopIDs  = App\Admin\Shop::pluck('id')->all();

    $name = [
        '男性',
        '女性',
        '学生',
        'シニア',
    ];

    $price = [
        '5000',
        '7000',
        '8000',
        '9000',
        '10000',
        '12000',
        '15000',
        '16000',
        '20000',
    ];
    
    

    return [
        'shop_id' => $faker->randomElement($shopIDs),
        
        'name' => $faker->randomElement($name),
        'price' => $faker->randomElement($price),
        
        'created_at' => $faker->datetime($max = 'now', $timezone = date_default_timezone_get()),
    ];
});
