<?php

use Faker\Generator as Faker;

$factory->define(App\Index::class, function (Faker $faker) {
    return [
        'section' => 'involve',
        'section_title' => $faker->text,
        'title' => $faker->text,
        'body' => $faker->paragraph,
        'image' => $faker->image('public/storage/index', 256, 256, null, false),
    ];
});
