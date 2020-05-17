<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\User\Favorite;
use App\Model;
use Faker\Generator as Faker;

$factory->define(Favorite::class, function (Faker $faker)
{
    $userIDs = App\User::pluck('id')->all();
    $shopIDs = App\Admin\Shop::pluck('id')->all();

    return [
        'user_id' => $faker->randomElement($userIDs),
        'shop_id' => $faker->randomElement($shopIDs),
    ];
});
