<?php

namespace App\Http\Controllers\Cashier;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Billing\Traits\UserManagement;

class UserController extends Controller
{
    use UserManagement;
    
    public function home()
    {
    	return view('cashier.home');
    }

    public function clients()
    {
        $clients = $this->getAllClient();
    	return view('cashier.clients',compact('clients'));
    }

    public function logout()
    {
    	Auth::logout();
    	return redirect()->route('login');
    }
}
