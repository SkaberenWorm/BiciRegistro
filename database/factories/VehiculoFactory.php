<?php

use Faker\Generator as Faker;

$factory->define(BiciRegistro\Vehiculo::class, function (Faker $faker) {
    return [
        'codigo'    => $faker->isbn10,
        'modelo'    => $faker->domainWord,
        'color'     => $faker->colorName,
        'marca_id'  => $faker->numberBetween($min = 1, $max = 30),
        'dueno_id'  => $faker->unique()->numberBetween(1,200),
    ];
});
