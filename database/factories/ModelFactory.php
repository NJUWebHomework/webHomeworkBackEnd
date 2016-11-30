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
use Faker\Generator;


$factory->define(App\Dao\User::class, function (Generator $faker) {
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

$factory->define(App\Dao\Competition::class,function (Generator $faker){

    $startTime = Carbon::now()->addDays(rand(-5,10));
    $endTime = $startTime->copy()->addDays(rand(2,5));

   return [
       'name' => $faker->randomElement($array =
           ['南京运动会','荧光夜跑','南京马拉松','青奥会训练']),
       'type' => $faker->randomElement($array = ['single','team']),
       'totalNumber' => rand(2,10),
       'currentNumber' => 0,
       'startTime' => $startTime,
       'endTime' => $endTime,
       'score' => 5+5*rand(1,9)
   ];
});

$factory->define(\App\Dao\Activity::class,function (Generator $faker){
    $contents = ['挑战自我、突破极限、奋发拼搏、勇于开拓、赛出风格、赛出水平',
        '没有激情就没有希望，没有拼搏就没有成功',
        '体育使城市充满活力，城市因体育勃发生机',
        '只要拼，只要博，成功就在不远处。'];
    $createdAt = Carbon::now()
                    ->addDays(rand(-5,0))
                    ->addHours(rand(-4,4))
                    ->addMinutes(rand(-15,15));

    return[
        'content' => $faker->randomElement($array = $contents),
        'stars' => rand(5,50),
        'createdAt' => $createdAt,
   ];
});