<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User\Review;
use Faker\Generator as Faker;
use Illuminate\Support\Str;
use Carbon\Carbon;

$factory->define(Review::class, function (Faker $faker) {

    $userIDs = App\User::pluck('id')->all();
    $shopIDs = App\Admin\Shop::pluck('id')->all();
    $total_points = [1, 2, 3, 4, 5];
    $learns = [
        '体験レッスン',
        '月会費会員',
        'ビジター会員',
        'パーソナルトレーニング'
    ];

    $seasons = [
      '2020年',
      '2019年',
      '2018年',
      '2017年',
      '2016年',
      '2015年',
      '2014年',
      '2013年',
      '2012年',
      '2011年',
      '2010年',
      '2009年以前'
    ];


    return [
        'user_id' => $faker->randomElement($userIDs),
        'shop_id' => $faker->randomElement($shopIDs),
        'total_point' => $faker->randomElement($total_points),
        'learn' => $faker->randomElement($learns),
        'season' => $faker->randomElement($seasons),
        'merit' => $faker->realText(50),
        'demerit' => $faker->realText(50),
        'created_at' => $faker->datetime($max = 'now', $timezone = date_default_timezone_get()),
    ];
});
