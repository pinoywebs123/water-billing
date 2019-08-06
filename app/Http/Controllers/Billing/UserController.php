<?php

namespace App\Http\Controllers\Billing;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class UserController extends Controller
{
    
    public function home()
    {
    	return view('billing.home');
    }

    public function clients()
    {
    	return view('billing.clients');
    }

    public function pending_bills()
    {
    	return view('billing.pending_bills');
    }

    public function approved_bills()
    {
    	return view('billing.approved_bills');
    }

    public function logout()
    {
    	Auth::logout();
    	return redirect()->route('login');
    }
}
