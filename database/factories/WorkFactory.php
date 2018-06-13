<?php

use Faker\Generator as Faker;
use App\Teacher;
use App\WorkStatus;

$factory->define(App\Work::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence,
        'body' => $faker->paragraph,

        'completed_at' => $faker->dateTimeBetween('now', '+1 year'),

        'teacher_id' => factory(Teacher::class)->create()->id,

        'work_status_id' => factory(WorkStatus::class)->create()->id
    ];
});
