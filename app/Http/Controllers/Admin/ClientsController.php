<?php

namespace App\Http\Controllers\Admin;

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
        
        User::create($data);

        return back();
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

        return back();
    }

    public function client_lock($id)
    {
        if($this->lockClient($id)){
            return redirect()->back();
        }
    }

    public function view_records($id)
    {
        $client = $this->findClient($id);
        $records = $this->getWaterCosumption($id);
        return view('shared.client_records',compact('client','records'));
    }

    public function view_records_Store($id, WaterRates $water_rates)
    {
        return $this->storeWaterConsumption($id,$water_rates);
    }

    public function admin_client_paid($id)
    {
        return $this->paidWaterClient($id);
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
