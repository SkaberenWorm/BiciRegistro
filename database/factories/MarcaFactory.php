<?php

use Faker\Generator as Faker;

$factory->define(BiciRegistro\Marca::class, function (Faker $faker) {
    return [
        'description' => $faker->unique()->domainWord,
    ];
});
