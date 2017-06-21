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
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Keyword::class, function (Faker\Generator $faker) {

    return [
        'key' => $faker->unique()->word
    ];
});

$factory->define(App\Location::class, function (Faker\Generator $faker) {

    return [
        'location' => $faker->unique()->city
    ];
});

$factory->define(App\Video::class, function (Faker\Generator $faker) {

    return [
        'title' => $faker->unique()->title,
        'file' => 'public/GfYkqWfmAw48RnSmcVDOy0GuOSmmwgbl8DKCFmpQ.m4v',
        'duration' => 0,
        'file_size' => 0,
        'video_format' => 0,
        'bit_rate' => 0,
    ];
});