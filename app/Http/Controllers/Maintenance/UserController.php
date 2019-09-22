<?php

namespace App\Http\Controllers\Maintenance;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Model\Request as CientRequest;
use App\Billing\Traits\UserManagement;
use App\Billing\Traits\Billing;

class UserController extends Controller
{
    use UserManagement, Billing;

    public function home()
    {
    	return view('maintenance.home');
    }
    //clients
    public function client_records()
    {
        $clients = $this->getAllClient();
    	return view('maintenance.client_records',compact('clients'));
    }

    public function maintenance_client_view_records($id)
    {
        $client = $this->findClient($id);
        $records = $this->getWaterCosumption($id);
        return view('shared.maintenance_records',compact('records','client'));
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

    public function maintenance_get_client_info(Request $request)
    {
        return response()->json($this->getWaterInfo($request->biller_id));
    }

    public function maintenance_client_update_water()
    {
        
    }
}
