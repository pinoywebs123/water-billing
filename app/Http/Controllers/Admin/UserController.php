<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\User;
use App\Billing\Traits\UserManagement;
use App\Billing;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    use UserManagement;
    
    public function home()
    {
        $income = DB::select('SELECT MONTH(end_date) as month, sum(bill) as monthly_bill
                FROM billings GROUP BY MONTH(end_date) ORDER BY MONTH(end_date)');

        $consumption = DB::select('SELECT MONTH(end_date) as month, sum(water_consumption) as monthly_ws
        FROM billings GROUP BY MONTH(end_date) ORDER BY MONTH(end_date)');

    	return view('admin.home', compact('income', 'consumption'));
    }

    public function staffs()
    {
        $staffs = User::where([['role_id', '!=', 4], ['status_id', '!=', 6]])->get();
    	return view('admin.staffs', compact('staffs'));
    }

    public function clients()
    {
        $clients = $this->getAllClient();
    	return view('admin.clients', compact('clients'));
    }

    public function reports()
    {
        $start_date = @$_GET['start_date'];
        $end_date = @$_GET['end_date'];
        $total = Billing::where('status_id',1)->sum('bill');
        if($start_date == null && $end_date == null){
            $paid = Billing::where('status_id',1)->get();
        }else{
            $paid = Billing::where('status_id',1)->whereBetween('updated_at', [$start_date, $end_date])->get();
            
        }
        
    	return view('admin.reports',compact('paid','total'));
    }

    public function logout()
    {
    	Auth::logout();
    	return redirect()->route('login');
    }
}
