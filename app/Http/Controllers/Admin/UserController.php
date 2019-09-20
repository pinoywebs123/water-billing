<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\User;
use App\Billing\Traits\UserManagement;

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
    	return view('admin.reports');
    }

    public function logout()
    {
    	Auth::logout();
    	return redirect()->route('login');
    }
}
