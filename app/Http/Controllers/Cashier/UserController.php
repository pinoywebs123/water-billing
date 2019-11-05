<?php

namespace App\Http\Controllers\Cashier;

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
        $unpaid = Billing::where('status_id',0)->paginate(10);
        $income = DB::select('SELECT MONTH(end_date) as month, sum(bill) as monthly_bill
                FROM billings GROUP BY MONTH(end_date) ORDER BY MONTH(end_date)');

    	return view('cashier.home',compact('unpaid', 'income'));
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
