<?php

use Faker\Generator as Faker;

$factory->define(App\Recommendation::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence,
        'body' => $faker->paragraph,
        'email' => $faker->email,
        'telephone' => $faker->phoneNumber
    ];
});
