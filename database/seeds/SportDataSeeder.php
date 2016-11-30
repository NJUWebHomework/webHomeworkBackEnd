<?php

use App\Dao\User;
use GuzzleHttp\Client;
use Carbon\Carbon;
use GuzzleHttp\Middleware;

class SportDataSeeder extends \Illuminate\Database\Seeder
{


    public function run()
    {
        if(\App\Dao\SportData::query()->count()>10){
            return;
        }

        $client = new Client(['base_uri'=>'localhost:8000']);

        $users = User::query()->select('username')->orderBy('id')->limit(10)->get();

        $dayDiff = 15;
        $startDay = Carbon::now()->addDays(-$dayDiff);
        $endDay = Carbon::now()->addDays($dayDiff);

        foreach ($users as $user){
            $res = $client->request('POST', '/stat/'.$user->username.'/sport',
                ['json' => $this->createSportData($startDay,$endDay)]);
        }

    }

    private function createSportData(Carbon $startDay,Carbon $endDay){

        $sportData = [];

        $startDay->diffInDaysFiltered(function(Carbon $date) use(&$sportData) {
            $sportData = array_merge($sportData,$this->createOneDayData($date));
        }, $endDay);

        return $sportData;
    }

    private function createOneDayData(Carbon $date){
        $dt = $date->copy()->startOfDay();
        $dt2 = $date->copy()->endOfDay();

        $sportData = [];

        $dt->diffInHoursFiltered(function (Carbon $hour) use(&$sportData){
            $step = 0;
            $meters = 0;

            $hourNum = $hour->hour;
            if($hourNum<6){
                $step=0;
            }else if($hourNum<12){
                $step = rand(200,500);
            }else if($hourNum<20){
                $step = rand(500,1000);
            }else{
                $step = rand(0,200);
            }
            $meters = $step*0.7;

            array_push($sportData,[
                "startTime" => $hour->format('Y-m-d H:i:s'),
                "endTime" => $hour->copy()->addMinutes(59)->format('Y-m-d H:i:s'),
                "step" => $step,
                "meters"=> $meters
            ]);
        },$dt2);
        return $sportData;
    }
}