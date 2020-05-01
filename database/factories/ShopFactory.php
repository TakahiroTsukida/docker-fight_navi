<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Admin\Shop;
use Faker\Generator as Faker;
use Illuminate\Support\Str;
use Carbon\Carbon;

$factory->define(Shop::class, function (Faker $faker) {

    $adminIDs  = App\Admin\Admin::pluck('id')->all();

    $opens = [
        '平日13:00〜22:00　土日祝10:00〜18:00',
        '平日14:00〜22:00　土日祝10:00〜18:00',
        '平日10:00〜21:00　土日祝9:00〜15:00',
        '平日13:00〜22:00　土日祝10:00〜18:00',
        '平日12:00〜20:00　土10:00〜14:00',
        '13:00〜22:00',
    ];
    $closes = [
        '毎月第３水曜日',
        '毎週月曜日',
        '毎月５日',
        '毎週日曜日',
        '毎月第２火曜日',
        '祝日',
    ];

    $trials = [
        '無料',
        '有料',
        'なし',
    ];

    return [
        'admin_id' => $faker->randomElement($adminIDs),
        'name' => $faker->company,
        'tel' => $faker->isbn10,
        'address_number' => $faker->postcode,
        'address_ken' => $faker->prefecture,
        'address_city' => $faker->city,
        'address_other' => $faker->streetAddress,
        'open' => $faker->randomElement($opens),
        'close' => $faker->randomElement($closes),
        'web' => $faker->url,
        'trial' => $faker->randomElement($trials),
        'description' => $faker->realText(50),
        'created_at' => $faker->datetime($max = 'now', $timezone = date_default_timezone_get()),
    ];
});
