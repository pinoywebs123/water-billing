<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Request as CientRequest;
use Auth;
use App\Http\Requests\Admin\CreateRequest;

class RequestController extends Controller
{
    
    public function request_pending()
    {
    	$all_request = CientRequest::where('client_id',Auth::id())->where('status_id',1)->orderBy('created_at', 'desc')->get();
    	return view('client.request.pending',compact('all_request'));
    }

    public function request_approved()
    {
    	$all_request = CientRequest::where('client_id',Auth::id())->where('status_id','!=',1)->orderBy('created_at', 'desc')->get();
    	return view('client.request.approved',compact('all_request'));
    }

    public function request_pending_store(Request $request,CreateRequest $create_request)
    {
    	$req = new CientRequest;
        $req->client_id = Auth::id();
        $req->status_id = 1;
        $req->title 	= $request->title;

        if ($req->title == "Change name" or $req->title == "Change location")
            $req->answer 	= $request->full_name;
        elseif ($req->title == "Change birthdate")
            $req->answer 	= $request->bday;
        elseif ($req->title == "Others")
            $req->answer 	= $request->answer;
        
        $req->content 	= ($request->content?$request->content:'');
        $req->save();

        return redirect()->back()->with('success','Request has been sent successfully!');
    }
}
