<?php

use Illuminate\Database\Seeder;
use App\Rate;
use App\SummaryRate;

class RateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rate = Rate::create([
        	'from'		=> 0,
        	'to'		=> 10,
        	'user_id'	=> 1,
        ]);

	        SummaryRate::create([
	        	'rate_id'	=> $rate->id,
	        	'price'		=> 142,
	        	'reason'	=> 'minimum fee'
	        ]);


	    $rate = Rate::create([
        	'from'		=> 11,
        	'to'		=> 20,
        	'user_id'	=> 1,
        ]);

	        SummaryRate::create([
	        	'rate_id'	=> $rate->id,
	        	'price'		=> 18.35,
	        	'reason'	=> '11 and above fee'
	        ]);
	        

	    $rate = Rate::create([
        	'from'		=> 21,
        	'to'		=> 30,
        	'user_id'	=> 1,
        ]);

	        SummaryRate::create([
	        	'rate_id'	=> $rate->id,
	        	'price'		=> 22.75,
	        	'reason'	=> '21 and above fee'
	        ]);
	        

	    $rate = Rate::create([
        	'from'		=> 31,
        	'to'		=> 40,
        	'user_id'	=> 1,
        ]);

	        SummaryRate::create([
	        	'rate_id'	=> $rate->id,
	        	'price'		=> 27.35,
	        	'reason'	=> '31 and above fee'
	        ]);
	        
	    $rate = Rate::create([
        	'from'		=> 41,
        	'to'		=> 1000,
        	'user_id'	=> 1,
        ]);

	        SummaryRate::create([
	        	'rate_id'	=> $rate->id,
	        	'price'		=> 32.10,
	        	'reason'	=> '41 and above fee'
	        ]);                
    }
}
