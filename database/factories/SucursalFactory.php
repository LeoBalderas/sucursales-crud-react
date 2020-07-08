<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Sucursale;
use Faker\Generator as Faker;

$factory->define(Sucursale::class, function (Faker $faker) {
    return [
        'Nombre' => $faker->sentence(),
        'Direccion' => $faker->paragraph(),
        'Telefono' => $faker->phoneNumber()
    ];
});
