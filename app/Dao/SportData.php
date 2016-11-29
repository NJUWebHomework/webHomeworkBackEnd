<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2016/11/29
 * Time: 18:59
 */

namespace App\Dao;


use Illuminate\Database\Eloquent\Model;

class SportData extends Model
{
    public $table = 'sportData';
    public $timestamps = false;
    protected $dates = ['startTime','endTime'];
    protected $casts = [
        'step' => 'integer',
        'meters' => 'integer'
    ];

}