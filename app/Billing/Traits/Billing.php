<?php

namespace App\Billing\Traits;
use Request;
use Auth;
use App\Billing as ClientBill;
use App\Billing\Admin\WaterRates;

use Illuminate\Support\Facades\Mail;
use App\Mail\Paid;
use App\User;

trait Billing {

	public function getWaterCosumption($id)
	{
		return ClientBill::where('client_id',$id)->orderBy('id','desc')->get();
	}

	public function getWaterInfo($id)
	{
		return ClientBill::findOrFail($id);
	}

	public function storeWaterConsumption($id, $water)
	{
			$previous_water_consumption = ClientBill::where('client_id',$id)->latest()->first();
			$data = $this->validateRequest();
			$data['client_id'] = $id;
			$data['status_id'] = 0;
			$data['bill'] = ($this->request->water_consumption - $previous_water_consumption->water_consumption) * $water->getCurrentRate()->rates;
			
			ClientBill::create($data);
			return redirect()->back()->with('success','Client New Bill Successfully Added!');
	}

	public function editWaterConsumption($data, $water)
	{
		
		$previous_water_consumption = ClientBill::where('id',$data['bill_id'] - 1)->latest()->first();
		$findAndUpdate =  ClientBill::findOrFail($data['bill_id']);

		$findAndUpdate->update([
			'water_consumption'		=> $data['water_consumption'],
			'bill'					=> ($data['water_consumption'] - $previous_water_consumption->water_consumption) * $water->getCurrentRate()->rates	
		]);
		return redirect()->back()->with('success','Client Water Consumption has been Updated Successfully!');
	}

	public function paidWaterClient($id, $client_id)
	{
		$findClient = ClientBill::where('id',$id)->first();
		$findClient->update(['status_id'=> 1]);

		$user = User::where('id', $client_id)->first();

        Mail::to($user->email)->send(new Paid($user));

        return redirect()->back()->with('success','Client Has Paid Successfully! <br /> Your email will receive a copy of this notification.');
    }

	public function validateRequest(){

		return $this->request->validate([
			'water_consumption'	=> 'required',
			'start_date'		=> 'required',
			'end_date'			=> 'required',
		]);
	}
}