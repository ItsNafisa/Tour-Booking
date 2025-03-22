<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Auth;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\LoginRequest;
use Redirect;
use App\Repository\IAuthRepository;
class AuthController extends Controller
{
    public $authVar;

    public function __construct(IAuthRepository $authVar){
$this->authVar=$authVar;
    }

    public function loginview(){
      return  $this->authVar->loginview();
    }
    
    public function login(LoginRequest $request){
        return  $this->authVar->login($request);
    }

    public function register(){
        return view('user.register');
     }

     public function registerUser(RegisterRequest $request){
        return  $this->authVar->registerUser($request);
     }

     public function logout(){
        return  $this->authVar->logout();
     }
}
