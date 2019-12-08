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
		$aw = 0;
			$previous_water_consumption = ClientBill::where('client_id',$id)->latest()->first();

			if($previous_water_consumption['water_consumption']){
				$aw = $previous_water_consumption->water_consumption;
			}

			$diffrerence_water_consumption = $this->request->water_consumption - $aw;
			

			$data = $this->validateRequest();
			$data['client_id'] = $id;
			$data['status_id'] = 0;
			$data['bill'] = $this->calculate_amount($diffrerence_water_consumption);
			
			ClientBill::create($data);
			return redirect()->back()->with('success','Client New Bill Successfully Added!');
	}

	public function editWaterConsumption($data, $water)
	{
		
		$previous_water_consumption = ClientBill::where('id',$data['bill_id'] - 1)->latest()->first();
		$findAndUpdate =  ClientBill::findOrFail($data['bill_id']);
		
		

		$diffrerence_water_consumption = $data['water_consumption'] - $previous_water_consumption->water_consumption;

		$findAndUpdate->update([
			'water_consumption'		=> $data['water_consumption'],
			'bill'					=> $this->calculate_amount($diffrerence_water_consumption),
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

	public function calculate_amount($water_consume){

			if($water_consume <= 10){
				return 142;
			}

			if($water_consume <= 20 && $water_consume > 10){
				$one = $water_consume - 10;
				$two = $one * 18.35;

				return $final = $two + 142;
			}
			if($water_consume <= 30 && $water_consume > 21){
				$one = $water_consume - 10;
				$two = $one - 10;
				$three = $two * 22.75;

				return $final = $three + 183.5 + 142;
			}
			if($water_consume <= 40 && $water_consume > 31){
				$semi = $water_consume - 30;
				$semi = $semi * 27.35;
				return $final = $semi + 142 + 183.5 + 227.5;
			}

			if($water_consume > 40){
				$semi = $water_consume - 40;
				$semi = $semi * 32.10;
				return $final = $semi + 142 + 183.5 + 227.5 + 273.5;
			}
	}
}