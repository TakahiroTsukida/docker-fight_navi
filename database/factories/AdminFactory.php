<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Admin\Admin;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Admin::class, function (Faker $faker) {

    $genders = [
        '男性',
        '女性'
    ];

    return [
        'name' => $faker->name,
        'gender' => $faker->randomElement($genders),
        'birthday' => $faker->datetime($max = 'now', $timezone = date_default_timezone_get()),
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => Hash::make('12345678'), // password
        'company_name' => $faker->company,
        'tel' => $faker->phoneNumber,
        'address_number' => $faker->postcode,
        'address_ken' => $faker->prefecture,
        'address_city' => $faker->city,
        'web' => $faker->url,
        'remember_token' => Str::random(10),
        'created_at' => $faker->datetime($max = 'now', $timezone = date_default_timezone_get()),
    ];
});
