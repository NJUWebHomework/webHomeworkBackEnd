<?php

use App\Dao\Competition;
use App\Dao\User;

class CompetitionSeeder extends \Illuminate\Database\Seeder
{

    public function run()
    {

        if(Competition::count()>10){
            return;
        }

        $users = User::query()->select('username')->orderBy('id')->limit(5)->get();

        foreach ($users as $user){
            $competitions = factory(Competition::class,5)->make();
            $user->ownCompetitions()->saveMany($competitions);

            foreach ($competitions as $competition){
                $names = User::query()
                    ->orderBy('id')
                    ->limit(rand(0,$competition->totalNumber))
                    ->pluck('username');

                $competition->number()->attach($names->all());
            }

        }

    }
}