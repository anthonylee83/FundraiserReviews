<?php

use Faker\Generator as Faker;

$factory->define(Model::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->email,
        'rating' => $faker->numberBetween(1, 5),
        'validated' => $faker->boolean,
        'hash' => str_random()
    ];
});
