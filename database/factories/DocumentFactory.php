<?php

use App\Document;
use App\User;
use Carbon\Carbon;
use Faker\Generator as Faker;

$factory->define(Document::class, function (Faker $faker) {
    return [
        'body'       => $faker->sentence,
        'title'      => $faker->word,
        'private'    => $faker->boolean(),
        'user_id'    => create(User::class),
        'created_at' => Carbon::now()->subHours(random_int(0, 1000)),
    ];
});
