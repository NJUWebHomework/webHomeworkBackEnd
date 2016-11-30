<?php

namespace App\Http\Controllers;

use App\Service\UserService;
use Illuminate\Http\Request;
use Log;

class UserController extends Controller
{

    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function auth(Request $request){

        Log::info(print_r($request->input(),true));

        $this->validate($request, [
            'username' => 'required',
            'password' => 'required'
        ]);

        $api_token = $this->userService->login($request->all());

        if($api_token!=null){
            return ['status'=>'success','api_token'=>$api_token];
        }else{
            abort(401,'Unauthorized.');
        }
    }

    public function getUser($username){
        $user = $this->userService->getUser($username);

        if($user==null){
            abort(404,'no such user');
        }

        return $user;
    }

}
