<?php


use App\Dao\Competition;

class CompetitionTest extends TestCase
{
    public function testOwner(){

        $competition = Competition::query()->first();
        $owner = $competition->ownerUser;
        Log::info('owner',[$owner]);
    }

}