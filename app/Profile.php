<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $guarded = [];
    
    public function role() {
        return $this->belongsTo(Role::class);
    }
    
}
