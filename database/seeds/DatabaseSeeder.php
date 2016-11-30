<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call('UserTableSeeder');
        $this->call('SportDataSeeder');
        $this->call('CompetitionSeeder');
        $this->call('WatchSeeder');
        $this->call('ActivitySeeder');
    }
}
