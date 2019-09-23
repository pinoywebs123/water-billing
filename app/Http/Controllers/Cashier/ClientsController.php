<?php

namespace App\Http\Controllers\Cashier;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\User;
use App\Billing\Traits\UserManagement;
use App\Billing\Traits\Billing;
use App\Billing\Admin\WaterRates;

class ClientsController extends Controller
{
	use UserManagement, Billing;

    public function clients_store()
    {
        $data = request()->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $data['password'] = bcrypt(request()->password);
        $data['role_id'] = 4;
        $data['status_id'] = 3;
        
        User::create($data);

       return back()->with('success','Client Added Successfully!');
    }

    public function clients_update()
    {
        $data = request()->validate([
            'id' => 'required',
            'name' => 'required',
            'email' => 'required|email',
            'password' => ''
        ]);

        if ($data['password'] == '')
            unset($data['password']);
		else
			$data['password'] = bcrypt(request()->password);
		
        $data['role_id'] = 4;
        
        User::find($data['id'])->update($data);

        return back()->with('success','Client Information Updated Successfully!');
    }

    public function client_lock($id)
    {
        if($this->lockClient($id)){
            return redirect()->back()->with('success','Client Account Successfully Locked!');
        }
    }

    public function view_records($id)
    {
        $client = $this->findClient($id);
        $records = $this->getWaterCosumption($id);
        $usertype = 'cashier';

        return view('shared.billing_records',compact('client','records', 'usertype'));
    }

    public function view_records_Store($id)
    {
        return $this->storeWaterConsumption($id);
    }

    public function admin_get_client_info(Request $request)
    {
        return response()->json($this->getWaterInfo($request->biller_id));
    }

    public function admin_client_update_water(Request $request, WaterRates $water)
    {
        return $this->editWaterConsumption($request->except('_token'),$water);
    }
}
