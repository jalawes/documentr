<?php

use App\Group;
use Faker\Generator as Faker;

$factory->define(Group::class, function (Faker $faker) {
    return [
        'description' => $faker->paragraph,
        'name'        => $faker->company,
        'private'     => $faker->boolean,
    ];
});
