<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2016/11/29
 * Time: 20:51
 */

namespace App\Http\Controllers;

use App\Dao\SportData;
use Illuminate\Http\Request;

class SportDataController extends Controller
{
    protected  $sportDao;

    public function __construct(SportData $sportData){
        $this->sportDao = $sportData;
    }

    public function post(Request $request,$username){

        $dataList = $request->input();
        foreach ($dataList as &$data){
            $data['username'] = $username;
        }

        $sliceLength = 30;
        for($i = 0; $i*$sliceLength< count($dataList);$i++){
            $this->sportDao->insert
            (array_slice($dataList,$i*$sliceLength,$sliceLength));
        }

    }

}