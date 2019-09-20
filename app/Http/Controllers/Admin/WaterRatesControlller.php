<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Billing\Admin\WaterRates;


class WaterRatesControlller extends Controller
{
	public $water;

	public function __construct(WaterRates $water)
	{
		$this->water = $water;
	}

    public function water_rates()
    {
    	$current = $this->water->getCurrentRate();
    	$rates = $this->water->getHistoryRates();
    	return view('admin.water_rates',compact('rates','current'));
    }

    public function store()
    {
    	return $this->water->store();
    }
}
