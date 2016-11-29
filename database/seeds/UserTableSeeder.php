<?php

use App\Dao\User;

class UserTableSeeder extends \Illuminate\Database\Seeder
{

    public function run()
    {
        if(User::query()->count()>10){
            return;
        }

        $adminUser = ['sbin','ss','sc','srf','Spring','Hibernate','Laravel'];

        foreach($adminUser as $user){
            factory(User::class)->create(['username'=>$user,'isAdmin'=>true]);
        }
        factory(User::class,50)->create();
    }
}