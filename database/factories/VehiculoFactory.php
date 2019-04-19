<?php

use Faker\Generator as Faker;

$factory->define(App\Vehiculo::class, function (Faker $faker) {
    return [
        'codigo'    => $faker->isbn10,
        'modelo'    => $faker->domainWord,
        'color'     => $faker->colorName,
        'marca_id'  => $faker->numberBetween($min = 1, $max = 30),
        'dueno_id'  => $faker->numberBetween(1,6),
    ];
});
