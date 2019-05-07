<?php

use Faker\Generator as Faker;

$factory->define(BiciRegistro\Dueno::class, function (Faker $faker) {
    return [
       
        'rut' => $faker->unique()->numberBetween(1111111,99999999),
        'nombre' => $faker->name,
        'correo' => $faker->unique()->safeEmail,
        'celular'   =>$faker->numberBetween(60000000,99999999),
        'tipoDueno_id' => $faker->numberBetween(1,6),
    ];
});
