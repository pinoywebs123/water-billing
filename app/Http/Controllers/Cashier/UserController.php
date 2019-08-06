<?php

namespace App\Http\Controllers\Cashier;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class UserController extends Controller
{
    
    public function home()
    {
    	return view('cashier.home');
    }

    public function logout()
    {
    	Auth::logout();
    	return redirect()->route('login');
    }
}
