<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RequestController extends Controller
{
    
    public function request_pending()
    {
    	return view('client.request.pending');
    }

    public function request_approved()
    {
    	return view('client.request.approved');
    }
}
