<?php

use Faker\Generator as Faker;

$factory->define(BiciRegistro\Dueno::class, function (Faker $faker) {
    return [

        'rut' => ($faker->unique()->numberBetween(18111100,19999999).'-'.$faker->numberBetween(1,9)),
        'nombre' => $faker->name,
        'correo' => $faker->unique()->safeEmail,
        'celular'   =>$faker->numberBetween(60000000,99999999),
        'tipoDueno_id' => $faker->numberBetween(1,6),
    ];
});
