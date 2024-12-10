<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\LoginRequest;

class AuthController extends Controller
{
    //
    public function register(RegisterRequest $request)
    {
        return view('register');
    }

    public function login(LoginRequest $request)
    {
        return view('login');
    }
}
