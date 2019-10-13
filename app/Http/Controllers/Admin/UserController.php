<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\User;
use App\Billing\Traits\UserManagement;
use App\Billing;

class UserController extends Controller
{
    use UserManagement;
    
    public function home()
    {
    	return view('admin.home');
    }

    public function staffs()
    {
        $staffs = User::where('role_id', '!=', 4)->get();
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
