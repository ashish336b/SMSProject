<?php

use Faker\Generator as Faker;
use Illuminate\Support\Str;
$factory->define(App\Admin::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'job_title'=> 'admin',
        'isSuperAdmin' => 0,
        'remember_token' => Str::random(10),
    ];
});
