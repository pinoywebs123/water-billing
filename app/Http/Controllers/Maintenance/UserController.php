<?php

namespace App\Http\Controllers\Maintenance;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Model\Request as CientRequest;
use App\Billing\Traits\UserManagement;
use App\Billing\Traits\Billing;
use App\Billing\Admin\WaterRates;

class UserController extends Controller
{
    use UserManagement, Billing;

    public function home()
    {
        $all_request = CientRequest::where('status_id',4)->where('worked_by',Auth::id())->get();
    	return view('maintenance.home',compact('all_request'));
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
        $all_request = CientRequest::where('status_id',3)->where('worked_by',Auth::id())->get();
    	return view('maintenance.approved_bills',compact('all_request'));
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

    public function maintenance_client_update_water(Request $request, WaterRates $water)
    {
        return $this->editWaterConsumption($request->except('_token'),$water);
    }

    public function maintenance_accpet_job(Request $request){
        $find = CientRequest::findOrFail($request->request_id);
        $find->update(['worked_by'=> Auth::id(),'status_id'=> 3]);
        return back()->with('success','Sucessfully Accept Job');
    }

    public function maintenance_client_job_info(Request $request){
        $req = CientRequest::findOrFail($request->data);
        return $req->with('user')->first();
    }

    public function maintenance_job_finished($id){
        $req = CientRequest::findOrFail($id);
        $req->update(['status_id'=> 4]);
        return back()->with('success','Client Job Request has been Finished!');
    }
}
