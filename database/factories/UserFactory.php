<?php

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

$factory->define(\App\Models\User::class, function (Faker $faker) {
    $data = [];
    $inarray = ["football","hockey","curling","snowboarding","skiing", "fishing", "cycling", "baseball","basketball"];

    if ($faker->boolean) {
        $data['hobby'] = $faker->randomElements($inarray, mt_rand(1,9), false);
    }

    if ($faker->boolean) {
        $data['date_of_birth'] = $faker->date($format = 'Y-m-d', $max = 'now');
    }

    if ($faker->boolean)  {
        $data['gender'] = $faker->randomElement(['male', 'female']);
    }

    return [
        'name' => $faker->name,
        'data' => $data,
        'geo_location' => [
            'lat' => $faker->latitude,
            'lng' =>  $faker->longitude,
        ],
    ];
});
