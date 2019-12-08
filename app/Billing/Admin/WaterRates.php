<?php 

namespace App\Billing\Admin;
use Illuminate\Http\Request;
use App\Rate;
use Auth;

class WaterRates {

	public $request;

	public function __construct(Request $request)
	{
		$this->request = $request;
	}

	public function getCurrentRate()
	{
		return Rate::orderBy('id','desc')->first();
	}

	public function getAllNewRate()
	{
		return Rate::all();
	}

	public function getHistoryRates()
	{
		return Rate::orderBy('id','desc')->get();
	}
	public function store()
	{
		
		if($this->requestValidate()){
			$rate = new Rate;
			$rate->rates = $this->request->rates;
			$rate->user_id = Auth::id();
			$rate->save();
			return redirect()->back()->with('success','You have successfully Added New Rates');
		}
		
	}

	public function requestValidate()
	{
		return [
			'rates'	=> 'required',
			'user_id' => 'required'
		];
	}

}