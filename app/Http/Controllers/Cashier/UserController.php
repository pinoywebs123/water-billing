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

    public function filter_income_chart(Request $request)
    {

        $from = $request->input('from');
        $to = $request->input('to');

        $months = array();
        $incomes = array();

        $income = DB::select("SELECT MONTH(end_date) as month, sum(bill) as monthly_bill, start_date, end_date
                FROM billings GROUP BY MONTH(end_date) HAVING start_date >= '$from' AND end_date <= '$to' ORDER BY MONTH(end_date)");
        
        $count = 0;
        foreach($income as $month) {
           
            $month = $month->month;
            $month = date("F", mktime(0, 0, 0, $month, 10));
            
            $months[$count] = $month;                
            $count++;
            
        }

        $count = 0;
        foreach($income as $bill) {
           
            $income = $bill->monthly_bill; 
            $incomes[$count] = $income;

            $count++;
            
        }

        return [$months, $incomes];

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
