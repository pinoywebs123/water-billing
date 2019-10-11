<?php

namespace App\Http\Controllers\Admin;

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
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'account_id' => 'required'    
        ]);

        $data2 = request()->validate([
            'first_name' => 'required',
            'middle_name' => 'required',
            'last_name' => 'required',
            'birth_date' => 'required|date',
            'gender' => 'required',
            'contact' => 'required|numeric',
            'address' => 'required',
            'city' => 'required',
            'province' => 'required'
        ]);

        $data['password'] = bcrypt(request()->password);
        $data['role_id'] = 4;
        $data['status_id'] = 3;
        
        $user = new User;
        $user->role_id = $data['role_id'];
        $user->account_id = $data['account_id'];
        $user->email = $data['email'];
        $user->password = $data['password'];
        $user->status_id = $data['status_id'];
        $user->save();

        $user_id = User::orderBy('updated_at', 'desc')->first()->id;
        $data2['user_id'] = $user_id;

        Profile::create($data2);

        return back()->with('success','New Client Successfully Added!');
    }

    public function clients_update()
    {
        $data = request()->validate([
            'id' => 'required',
            'email' => 'required|email',
            'password' => '',
            'account_id' => 'required'
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
