<?php

namespace App;
use App\SummaryRate;

use Illuminate\Database\Eloquent\Model;

class Rate extends Model
{
    protected $guarded = [];

    public function summary_rate($id)
    {
    	return SummaryRate::where('id',$id)->orderBy('id','desc')->first();
    }
}
