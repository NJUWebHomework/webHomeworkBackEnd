<?php

namespace App\Dao;

use Illuminate\Auth\Authenticatable;
use Laravel\Lumen\Auth\Authorizable;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class User extends Model {

    public $table = 'user';
    public $timestamps = false;

    protected $primaryKey = 'username';
    public $incrementing = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = ['password'];

    protected $dates = ['signUpDate'];
    protected $dateFormat = 'Y-m-d';
    protected $visible = ['username', 'location','avatar'];

    //设置类型转化
    protected $casts = [
        'isAdmin' => 'boolean',
        'height' => 'double',
        'weight' => 'double',
        'watchedCount' => 'integer',
        'watchingCount' => 'integer',
        'goal' => 'integer'
    ];
    protected $appends = ['BMI'];

    public function toFullArray(){

        $visibleAttr = ['signUpDate','height','weight',
            'gender','description','watchedCount',
            'watchingCount','goal','isAdmin','BMI'];

        return $this->makeVisible($visibleAttr)->toArray();
    }

    public function getBMIAttribute()
    {
        $bmi = $this->weight/pow($this->height/100,2);
        return round($bmi,2);
    }

    public function ownCompetitions(){
        return $this->hasMany('App\Dao\Competition','owner');
    }

    public function asNumberCompetitions(){
        return $this->belongsToMany('App\Dao\Competition',
            'competition_user',
            'username',
            'competitionId');
    }

    public function watchingUser(){
        return $this->belongsToMany('App\Dao\User',
            'watch',
            'watchingName',
            'watchedName');
    }

    public function activities(){
        return $this->hasMany('App\Dao\Activity','author');
    }

}
