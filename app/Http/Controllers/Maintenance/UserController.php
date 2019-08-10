<?php

namespace App\Http\Controllers\Maintenance;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Model\Request as CientRequest;

class UserController extends Controller
{

    public function home()
    {
    	return view('maintenance.home');
    }

    public function client_records()
    {
    	return view('maintenance.client_records');
    }

    public function pending_bills()
    {
        $all_request = CientRequest::where('status_id',2)->get();
    	return view('maintenance.pending_bills',compact('all_request'));
    }

    public function approved_bills()
    {
    	return view('maintenance.approved_bills');
    }

    public function logout()
    {
    	Auth::logout();
    	return redirect()->route('login');
    }
}
