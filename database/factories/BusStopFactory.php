<?php


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


$factory->define(\App\Models\BusStop::class, function (Faker\Generator $faker) {
    $faker->addProvider(new Faker\Provider\en_SG\Address($faker));

    return [
        'code' => $faker->unique()->numberBetween(0,999),
        'road_name' => $faker->streetName,
        'description' => $faker->address,
        'latitude' => $faker->latitude,
        'longitude' => $faker->longitude
    ];
});
