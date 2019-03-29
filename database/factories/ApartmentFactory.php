<?php

use Faker\Generator as Faker;

$factory->define(App\Apartment::class, function (Faker $faker) {
    return [
        'email' => $faker->email->valid()->unique(),
        'url' => $faker->url,
    ];
});
