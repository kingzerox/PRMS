<?php

namespace App\Models;

class Apply extends Model
{
    public function device()
    {
        return $this->belongsTo(Device::class,'device_id','id');
    }

    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }
}
