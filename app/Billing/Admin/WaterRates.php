<?php 

namespace App\Billing\Admin;
use Illuminate\Http\Request;
use App\Rate;
use Auth;
use App\SummaryRate;

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

	public function updateRate()
	{
		
		$find_rate = Rate::where('id', $this->request->rate_id)->first();
		if($find_rate){
			$sum = new SummaryRate;
			$sum->rate_id = $this->request->rate_id;
			$sum->price = $this->request->new_rate;
			$sum->reason = 'update new price';
			$sum->save();
			
			return back()->with('success','New Water Rates has been updated!');
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