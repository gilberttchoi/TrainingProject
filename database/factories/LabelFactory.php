<?php

$factory->define(App\Label::class, function (Faker\Generator $faker) {

    return [
        'name' => $faker->word()
        ];
});
