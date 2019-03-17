<?php

use App\User;
use Illuminate\Support\Str;
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

$factory->define(\Movies\Models\Movie::class, function (Faker $faker) {
    return [
        'title' => $faker->word,
        'director' => $faker->name,
        'duration' => $faker->time('H:i:s', 14400),
        'description' => $faker->text,
    ];
});
