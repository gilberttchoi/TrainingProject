<?php

$factory->define(App\Task::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'title' => $faker->realText(rand(10,40)),
        'deadline' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'detail' => $faker->realText(rand(100,200)),
    ];
});
