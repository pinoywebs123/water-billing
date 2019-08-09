<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

use App\User;

class UserController extends Controller
{
    
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
        $clients = User::where('role_id', 4)->get();
    	return view('admin.clients', compact('clients'));
    }

    public function water_rates()
    {
    	return view('admin.water_rates');
    }

    public function reports()
    {
    	return view('admin.reports');
    }

    public function logout()
    {
    	Auth::logout();
    	return redirect()->route('login');
    }
}
