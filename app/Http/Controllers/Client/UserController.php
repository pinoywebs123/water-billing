<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

use App\User;
use App\Profile;
use App\Billing;

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
        $unpaid = Billing::where('status_id',0)->where('client_id',Auth::id())->get();
    	return view('client.current_balance',compact('unpaid'));
    }

    public function trans_history()
    {
        $paid = Billing::where('status_id',1)->where('client_id',Auth::id())->get();
    	return view('client.trans_history',compact('paid'));
    }

    public function logout()
    {
    	Auth::logout();
    	return redirect()->route('login');
    }
}
