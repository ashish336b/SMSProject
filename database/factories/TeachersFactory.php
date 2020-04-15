<?php

use Faker\Generator as Faker;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

$factory->define(App\Teachers::class, function (Faker $faker) {
    return [
        'rollNumber' => $faker->unique()->randomDigitNotNull,
        'firstName' => $faker->firstName,
        'lastName' => $faker->lastName,
        'email' => $faker->unique()->email,
        'password' => Hash::make('11111111'),
        'address' => $faker->address,
        'phoneNumber' => $faker->numberBetween(9800000000, 9899999999),
        'department_id' => '1',
        'remember_token' => Str::random(10),
    ];
});
