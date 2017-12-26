<?php

use App\Document;
use App\User;
use Faker\Generator as Faker;

$factory->define(Document::class, function (Faker $faker) {
    return [
        'body'    => $faker->sentence,
        'title'   => $faker->word,
        'private' => $faker->boolean(),
        'user_id' => create(User::class),
    ];
});
