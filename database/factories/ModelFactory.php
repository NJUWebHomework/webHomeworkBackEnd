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
use Carbon\Carbon;


$factory->define(App\Dao\User::class, function (Faker\Generator $faker) {
    return [
        'username' => $faker->firstName.$faker->lastName,
        'password' => Hash::make('123456'),
        'signUpDate' => Carbon::createFromDate(rand(2015,2016),rand(1,12),rand(1,25)),
        'location' => $faker->randomElement($array = array ('南京','上海','北京')),
        'avatar' => 'avatar'.rand(1,3),
        'height' => 170 + rand(1,15),
        'weight' => 58 + rand(1,10),
        'gender' => $faker->randomElement($array = array ('male','female')),
        'description' => '快乐运动健康生活',
        'watchedCount' => 0,
        'watchingCount' => 0,
        'goal' => 8000,
        'isAdmin' => false
    ];
});
