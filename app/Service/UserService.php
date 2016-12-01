<?php


namespace App\Service;

use App\Dao\User;
use Illuminate\Support\Facades\Hash;


class UserService
{

    protected $userDao;

    public function __construct(User $user)
    {
        $this->userDao = $user;
    }

    public function login(array $loginInfo){
        $loginUser = $this->userDao->
                where('username',$loginInfo['username'])->first();

        if($loginUser == null){
            return null;
        }

        if(Hash::check($loginInfo['password'],$loginUser->password)){
            return $loginUser->password;
        }else{
            return null;
        }
    }

    public function getUser($username){

        $user = $this->userDao->where('username',$username)->first();

        if($user == null ){
            return null;
        }

        return $user->toFullArray();

    }

    public function getWatching($username){
        $user = $this->userDao->find($username);
        return $user->watchingUser;
    }

    public function register(array $data)
    {
        return User::create([
            'username' => $data['username'],
            'password' => Hash::make($data['password']),
        ]);
    }

}