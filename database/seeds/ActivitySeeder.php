
<?php

use Illuminate\Database\Seeder;
use App\Dao\Activity;
use \App\Dao\User;

class ActivitySeeder extends Seeder
{

    public function run()
    {
        if(Activity::query()->count()>10){
            return;
        }

        $users = User::query()->select('username')->orderBy('id')->limit(6)->get();

        foreach ($users as $user) {
            $activities = factory(Activity::class,4)->make();
            $user->activities()->saveMany($activities->all());
        }
    }
}