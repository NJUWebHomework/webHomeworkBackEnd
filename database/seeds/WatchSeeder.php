<?php


use App\Dao\User;

class WatchSeeder extends \Illuminate\Database\Seeder
{


    public function run()
    {
        if(DB::table('watch')->count()>10){
            return;
        }

        $names = User::query()
            ->orderBy('id')
            ->limit(6)
            ->pluck('username');

        foreach ($names as $watchingName){
            foreach ($names as $watchedName){
                try{
                    DB::table('watch')->insert(
                        ['watchingName'=>$watchingName,
                            'watchedName'=>$watchedName]);
                }catch (PDOException $e){
                    //do nothing
                }
            }
        }

    }
}