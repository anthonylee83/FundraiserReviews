<?php

use Faker\Generator as Faker;

$factory->define(App\Fundraiser::class, function (Faker $faker) {
    return [
        'name' => $faker->company,
        'location' => $faker->city . ", " . $faker->stateAbbr,
        'slug' => str_slug($faker->company . $faker->city . ", " . $faker->stateAbbr),
    ];
});
