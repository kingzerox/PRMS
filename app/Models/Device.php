<?php

namespace App\Models;

class Device extends Model
{
    protected $fillable = ['title', 'description', 'dev_category_id', 'last_user_id','status_id'];

    public function devCategory()
    {
        return $this->hasOne(DevCategory::class,'id','dev_category_id');
    }

    public function status()
    {
        return $this->hasOne(Status::class,'id','status_id');
    }

    public function apply()
    {
        return $this->hasOne(Apply::class,'device_id','id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

