<?php

namespace App\Http\Controllers\Cashier;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Billing\Traits\UserManagement;
use App\Billing;

class UserController extends Controller
{
    use UserManagement;
    
    public function home()
    {
        $unpaid = Billing::where('status_id',0)->paginate(10);
    	return view('cashier.home',compact('unpaid'));
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
