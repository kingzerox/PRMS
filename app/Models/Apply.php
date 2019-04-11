<?php

namespace App\Models;

class Apply extends Model
{
    protected $fillable = [
        'device_id','user_id','status_id'
    ];
    public function device()
    {
        return $this->belongsTo(Device::class,'device_id','id');
    }

    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }

    public function appstatus()
    {
        return $this->hasOne(AppStatus::class,'id','app_status_id');
    }


}
