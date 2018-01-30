<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'username' => $faker->unique()->userName,
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => 'pass22',
        'living' => $faker->address,
        'type' => 2,
        'dvla_points' => null,
        'documents' => null,
        'payment' => null,
        'insurance_number' => null
    ];
});

$factory->define(App\Models\Make::class, function ($faker) use ($factory) {
    return [
        'title' => $faker->sentence(10),
        'code' => $faker
    ];
});