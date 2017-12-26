<?php

use App\Library;
use Faker\Generator as Faker;

$factory->define(Library::class, function (Faker $faker) {
    return [
        'description' => $faker->paragraph,
        'name'        => $faker->company,
        'private'     => $faker->boolean,
    ];
});
