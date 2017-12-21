<?php

use App\User;
use Faker\Generator as Faker;

$factory->define(App\Document::class, function (Faker $faker) {
    return [
        'user_id' => create(User::class),
        'body' => $faker->sentence,
    ];
});
