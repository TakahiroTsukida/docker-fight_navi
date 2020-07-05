<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Admin\Open;
use Faker\Generator as Faker;
use Illuminate\Support\Str;
use Carbon\Carbon;

$factory->define(Open::class, function (Faker $faker) {
    $shopIDs  = App\Admin\Shop::pluck('id')->all();

    $day = [
        '平日',
        '土曜',
        '日曜',
        '祝日',
    ];

    $time = [
        '10:00〜22:00',
        '13:00〜20:00',
        '12:00〜23:00',
    ];
    
    

    return [
        'shop_id' => $faker->randomElement($shopIDs),
        
        'day' => $faker->randomElement($day),
        'time' => $faker->randomElement($time),
        
        'created_at' => $faker->datetime($max = 'now', $timezone = date_default_timezone_get()),
    ];
});
