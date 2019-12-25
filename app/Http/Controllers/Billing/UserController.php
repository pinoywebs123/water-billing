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

    public function filter_consumption_chart(Request $request)
    {

        $from = $request->input('from');
        $to = $request->input('to');

        $months = array();
        $consumptions = array();

        $consumption = DB::select("SELECT MONTH(end_date) as month, sum(water_consumption) as monthly_ws, start_date, end_date
        FROM billings GROUP BY MONTH(end_date) HAVING start_date >= '$from' AND end_date <= '$to' ORDER BY MONTH(end_date)");
        
        $count = 0;
        foreach($consumption as $month) {
           
            $month = $month->month;
            $month = date("F", mktime(0, 0, 0, $month, 10));
            
            $months[$count] = $month;                
            $count++;
            
        }

        $count = 0;
        foreach($consumption as $water_cons) {
            
            $consumptions[$count] = $water_cons->monthly_ws; 
            $count++;
            
        }

        return [$months, $consumptions];

    }

    public function filter_income_table(Request $request)
    {

        $from = $request->input('from');
        $to = $request->input('to');

        $total = Billing::where('status_id', 1)
                ->where('start_date', ">=" , $from)
                ->where('end_date', "<=" , $to)
                ->sum('bill');

        $unpaid = Billing::where('status_id',1)
                ->where('start_date', ">=" , $from)
                ->where('end_date', "<=" , $to)
                ->get();
                
        $count = 0;
        $final_unpaid = array();
        
        foreach($unpaid as $row) {
            $final_unpaid[$count] = 
                "<tr>
                    <td>" . $row->user->account_id . "</td>
                    <td>" . $row->user->email . "</td>
                    <td>$row->water_consumption</td>
                    <td>$row->start_date</td>
                    <td>$row->end_date</td>
                    <td>" . number_format($row->bill, 2) . "</td>
                    <td style='color: green'>Paid</td>
                    <td>" . $row->created_at->toDayDateTimeString() . "</td>
                </tr>";
            $count++;
        }

    	return [$total, $final_unpaid];

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
