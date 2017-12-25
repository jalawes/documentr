<?php

use App\User;
use Faker\Generator as Faker;

$factory->define(App\Document::class, function (Faker $faker) {
    return [
        'body'        => $faker->sentence,
        'filename'    => $faker->word . '.md',
        'private'     => $faker->boolean(),
        'user_id'     => create(User::class),
    ];
});
