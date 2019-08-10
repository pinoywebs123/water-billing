<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Request extends Model
{

	protected $guarded = [];  

    public function user()
    {
    	return $this->belongsTo('App\User','client_id','id');
    }

    public function status()
    {
    	return $this->belongsTo('App\Model\Status','status_id','id');
    }

    public function maintenance()
    {
    	return $this->belongsTo('App\User','worked_by','id');
    }

    public function biller()
    {
        return $this->belongsTo('App\User','approved_by','id');
    }
}
