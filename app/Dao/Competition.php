<?php


namespace App\Dao;


use Illuminate\Database\Eloquent\Model;
use App\Dao\User;

class Competition extends Model
{

    public $table = 'competition';
    public $timestamps = false;

    public function ownerUser(){
        return $this->belongsTo('App\Dao\User','owner');
    }

    public function number(){
        return $this->belongsToMany('App\Dao\User',
            'competition_user',
            'competitionId',
            'username');
    }

}