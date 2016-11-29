<?php

class UserTableSeeder extends \Illuminate\Database\Seeder
{

    public function run()
    {
        factory(\App\Dao\User::class)->create(['username'=>'sbin','isAdmin'=>true]);
        factory(\App\Dao\User::class,50)->create();
    }
}