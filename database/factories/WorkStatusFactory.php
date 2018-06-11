<?php

use Faker\Generator as Faker;

$factory->define(App\WorkStatus::class, function (Faker $faker) {
    return [
        'status' => $faker->word
    ];
});
