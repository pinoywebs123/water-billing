<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Billing\Auth\AuthClass;

class AuthController extends Controller
{
    public function login()
    {
    	return view('auth.login');
    }

    public function register()
    {
        return view('auth.register');
    }

    public function loginCheck(AuthClass $authclass)
    {
    	return $authclass->loginAttempt();
    }
}
