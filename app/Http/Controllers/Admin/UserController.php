<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class UserController extends Controller
{
    
    public function home()
    {
    	return view('admin.home');
    }

    public function staffs()
    {
    	return view('admin.staffs');
    }

    public function consumers()
    {
    	return view('admin.consumers');
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
