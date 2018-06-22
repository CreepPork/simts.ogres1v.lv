<?php

use Faker\Generator as Faker;

$factory->define(App\Event::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence,
        'summary' => $faker->sentence,
        'body' => $faker->paragraph,

        'event_at' => $faker->dateTimeBetween('now', '+1 year'),

        'image' => '/event/' . $faker->image('public/storage/event', 1024, 512, null, false)
    ];
});
