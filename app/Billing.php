<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Billing extends Model
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
}
