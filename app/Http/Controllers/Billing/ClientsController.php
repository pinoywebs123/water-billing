<?php

namespace App\Http\Controllers\Billing;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\User;
use App\Profile;
use App\Billing\Traits\UserManagement;
use App\Billing\Traits\Billing;
use App\Billing\Admin\WaterRates;

class ClientsController extends Controller
{
	use UserManagement, Billing;

    public function clients_store()
    {
        $data = request()->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $data2 = request()->validate([
            'first_name' => 'required',
            'middle_name' => 'required',
            'last_name' => 'required'
        ]);

        $data['password'] = bcrypt(request()->password);
        $data['role_id'] = 4;
        $data['status_id'] = 3;
        
        User::create($data);

        $user_id = User::orderBy('updated_at', 'desc')->first()->id;
        $data2['user_id'] = $user_id;
        $data2['birth_date'] = $date = date('Y-m-d', time());;
        $data2['gender'] = '';
        $data2['contact'] = '';
        $data2['address'] = '';
        $data2['city'] = '';
        $data2['province'] = '';

        Profile::create($data2);

        return back();
    }

    public function clients_update()
    {
        $data = request()->validate([
            'id' => 'required',
            'email' => 'required|email',
            'password' => ''
        ]);

        $data2 = request()->validate([
            'first_name' => 'required',
            'middle_name' => 'required',
            'last_name' => 'required',
        ]);

        if ($data['password'] == '')
            unset($data['password']);
		else
			$data['password'] = bcrypt(request()->password);
		
        $data['role_id'] = 4;
        
        User::find($data['id'])->update($data);
        Profile::where('user_id', $data['id'])->update($data2);

        return back();
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
        $usertype = 'billing';

        return view('shared.billing_records',compact('client','records', 'usertype'));
    }

    public function view_records_Store($id,WaterRates $water)
    {
        return $this->storeWaterConsumption($id,$water);
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
