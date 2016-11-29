<?php

namespace App\Dao;

use Illuminate\Auth\Authenticatable;
use Laravel\Lumen\Auth\Authorizable;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class User extends Model {

    public $table = 'user';

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'password',
    ];

    protected $dates = ['signUpDate'];
    protected $dateFormat = 'Y-m-d';
    protected $visible = ['username', 'location','avatar'];

    public function toShortArray(){

//        $this->makeHidden('attribute')->toArray()
    }

}
