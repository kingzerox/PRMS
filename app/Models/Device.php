<?php

namespace App\Models;

class Device extends Model
{
    protected $fillable = ['title', 'description', 'dev_category_id', 'last_user_id','status_id'];

    public function devcategory()
    {
        return $this->belongsTo(DevCategory::class,'dev_category_id','id');
    }
    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }
    public function status()
    {
        return $this->belongsTo(Status::class,'status_id','id');
    }


}
