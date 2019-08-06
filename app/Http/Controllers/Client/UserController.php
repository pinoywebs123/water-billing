<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class UserController extends Controller
{
    
    public function home()
    {
    	return view('client.home');
    }

    public function profile()
    {
    	return view('client.profile');
    }

    public function current_balance()
    {
    	return view('client.current_balance');
    }

    public function trans_history()
    {
    	return view('client.trans_history');
    }

    public function logout()
    {
    	Auth::logout();
    	return redirect()->route('login');
    }
}
