<?php

use Faker\Generator as Faker;

$factory->define(App\Gift::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence,
        'body' => $faker->paragraph
    ];
});
