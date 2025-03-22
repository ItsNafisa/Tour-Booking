<?php

namespace App\Repository;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
interface IAuthRepository{
    public function loginview();

    public function login(LoginRequest $request);

    public function registerUser(RegisterRequest $request);

    public function logout();
}
?>