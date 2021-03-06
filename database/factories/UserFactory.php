<?php

use App\User;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
    static $password;

    $sex = $faker->randomElement(['male', 'female']);

    if ($sex === 'male') {
        $title      = $faker->titleMale;
        $first_name = $faker->firstNameMale;
        $avatar = 'https://randomuser.me/api/portraits/men/' . random_int(1, 50) . '.jpg';
    } elseif ($sex === 'female') {
        $title      = $faker->titleFemale;
        $first_name = $faker->firstNameFemale;
        $avatar = 'https://randomuser.me/api/portraits/women/' . random_int(1, 50) . '.jpg';
    }

    return [
        'avatar'         => $avatar,
        'title'          => $title,
        'first_name'     => $first_name,
        'last_name'      => $faker->lastName,
        'email'          => $faker->unique()->safeEmail,
        'password'       => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
        'created_at'     => now()->subHours(random_int(1, 1000)),
    ];
});
