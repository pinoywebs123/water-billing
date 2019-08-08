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
        $staffs = User::all();
    	return view('admin.staffs', compact('staffs'));
    }

    public function staffs_store()
    {
        $data = request()->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'role_id' => 'required'
        ]);
        
        User::create($data);

        return back();
    }

    public function staffs_update()
    {
        $data = request()->validate([
            'id' => 'required',
            'name' => 'required',
            'email' => 'required|email',
            'password' => '',
            'role_id' => 'required'
        ]);

        if ($data['password'] == '')
            unset($data['password']);

        User::find($data['id'])->update($data);

        return back();
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
