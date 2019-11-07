<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Billing\Auth\AuthClass;
use App\User;

use Illuminate\Support\Facades\Mail;
use App\Mail\Paid;

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
    
    public function cron_deadline_email(){
        
        // temporary codes only

        $req = User::get()->first();
        if ($req == 'dummy08910@gmail.com') 
        //sends an email when the first user (Admin)'s email is changed to dummy08910@gmail.com during the scheduled cron job 
            Mail::to($user->email)->send(new Paid($req)); //temporarily user Paid mailable
        
    }
}
