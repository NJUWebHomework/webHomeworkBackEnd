<?php

class UserTableSeeder extends \Illuminate\Database\Seeder
{

    public function run()
    {
        factory(\App\Dao\User::class,50)->create();
    }
}