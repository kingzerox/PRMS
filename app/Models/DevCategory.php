<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DevCategory extends Model
{
    protected $fillable = [
        'name', 'description',
    ];

    public function device()
    {
        return $this->belongsTo(Device::class,'id','dev_category_id');
    }
}
