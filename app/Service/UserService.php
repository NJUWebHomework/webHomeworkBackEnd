<?php


namespace App\Service;

use App\Dao\User;
use Illuminate\Support\Facades\Hash;


class UserService
{

    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function login(array $loginInfo){
        $loginUser = User::query()->where('username',$loginInfo['username'])->first();

        if(Hash::check($loginInfo['password'],$loginUser->password)){
            return $loginUser->password;
        }else{
            return null;
        }
    }

    public function register(array $data)
    {
        return User::create([
            'username' => $data['username'],
            'password' => Hash::make($data['password']),
        ]);
    }

}