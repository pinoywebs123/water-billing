<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

use App\User;
use App\Profile;

class UserController extends Controller
{
    
    public function home()
    {
    	return view('client.home');
    }

    public function change_pass()
    {
    	return view('client.change_pass');
    }

    public function profile()
    {
        $user_id = Auth::user()->id;

        $profile = Profile::where('user_id', $user_id)->get();

        $user = User::where('id', $user_id)->first();

        if ($profile->count()) {

            $profile = $profile[0];
    	    return view('client.profile', compact('profile', 'user'));

        }
        else
            return view('client.profile2', compact('user'));
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
