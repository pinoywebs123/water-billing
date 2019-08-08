<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    
    public function user()
    {
    	return $this->belongsTo('App\User','client_id','id');
    }

    public function status()
    {
    	return $this->belongsTo('App\Model\Status','status_id','id');
    }
}
