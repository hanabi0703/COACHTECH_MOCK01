<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AuthController extends Controller
{
    //
    public function register()
    {
        return view('register');
    }

    public function login()
    {
        return view('login');
    }
}
