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
use Illuminate\Support\Facades\Hash;

$factory->define(App\Dao\User::class, function (Faker\Generator $faker) {
    return [
        'username' => $faker->name,
        'password' => Hash::make('123456')
    ];
});