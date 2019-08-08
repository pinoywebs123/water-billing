<?php

namespace App\Http\Controllers\Billing;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Request as CientRequest;
use Auth;

class ClientRequestController extends Controller
{
	public function pending_bills()
    {
    	$all_request = CientRequest::where('status_id',1)->get();
    	return view('billing.pending_bills',compact('all_request'));
    }

    public function approved_bills()
    {
    	$all_request = CientRequest::where('approved_by',Auth::id())->where('status_id',2)->get();
    	return view('billing.approved_bills',compact('all_request'));
    }
    
}
