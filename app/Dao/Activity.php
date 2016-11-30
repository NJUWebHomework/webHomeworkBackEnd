<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2016/11/30
 * Time: 16:48
 */

namespace App\Dao;


use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    public $table = 'activity';
    public $timestamps = false;

    protected $dates = ['createdAt'];

    protected $casts = ['stars'=>'integer'];

    public function authorUser(){
        return $this->belongsTo('App\Dao\User','author');
    }

}