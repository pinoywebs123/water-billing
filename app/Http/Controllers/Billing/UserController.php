<?php

namespace App\Http\Controllers\Billing;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Billing\Traits\UserManagement;
use App\Billing;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    use UserManagement;
    
    public function home()
    {
        $total = Billing::where('status_id',1)->sum('bill');
        $unpaid = Billing::where('status_id',1)->get();
        $consumption = DB::select('SELECT MONTH(end_date) as month, sum(water_consumption) as monthly_ws
        FROM billings GROUP BY MONTH(end_date) ORDER BY MONTH(end_date)');

    	return view('billing.home',compact('unpaid','total','consumption'));
    }

    public function clients()
    {
        $clients = $this->getAllClient();
    	return view('billing.clients',compact('clients'));
    }

    public function logout()
    {
    	Auth::logout();
    	return redirect()->route('login');
    }
}
