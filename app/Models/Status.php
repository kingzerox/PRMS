<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
   protected $fillable = [
        'name', 'description',
    ];

    public function device()
    {
        return $this->belongsTo(Device::class,'id','status_id');
    }
}
