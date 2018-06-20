<?php

use Faker\Generator as Faker;

$factory->define(App\Index::class, function (Faker $faker) {
    return [
        'section' => 'involve',
        'section_title' => $faker->text,
        'title' => $faker->text,
        'body' => $faker->paragraphs,
    ];
});
