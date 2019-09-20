<?php

namespace App\Billing\Traits;
use Illuminate\Http\Request;
use Auth;
use App\Billing as ClientBill;

trait Billing {

	public function getWaterCosumption($id)
	{
		return ClientBill::where('client_id',$id)->orderBy('id','desc')->get();
	}

	public function storeWaterConsumption($id)
	{

			$data = $this->validateRequest();
			$data['client_id'] = $id;
			$data['status_id'] = 0;
			$data['bill'] = 0;
			
			ClientBill::create($data);
			return redirect()->back()->with('success','Client New Bill Successfully Added!');
	}

	public function editWaterConsumption($id)
	{

	}

	public function validateRequest(){

		return $this->request->validate([
			'water_consumption'	=> 'required',
			'start_date'		=> 'required',
			'end_date'			=> 'required',
		]);
	}
}