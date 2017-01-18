<?php

$factory->define(App\Task::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'title' => str_random(10),
        'deadline' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'detail' => str_random(50),
    ];
});
