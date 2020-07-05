<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Admin\Other_price;
use Faker\Generator as Faker;
use Illuminate\Support\Str;
use Carbon\Carbon;

$factory->define(Other_price::class, function (Faker $faker) {
    $shopIDs  = App\Admin\Shop::pluck('id')->all();

    $name = [
        '年会費',
        'スポーツ保険',
    ];

    $price = [
        '1500',
        '3000',
        '2000',
        '1850',
    ];
    
    

    return [
        'shop_id' => $faker->randomElement($shopIDs),
        
        'name' => $faker->randomElement($name),
        'price' => $faker->randomElement($price),
        
        'created_at' => $faker->datetime($max = 'now', $timezone = date_default_timezone_get()),
    ];
});
