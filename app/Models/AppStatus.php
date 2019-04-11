<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AppStatus extends Model
{
    protected $fillable = [
        'name', 'description',
    ];
    public function apply()
    {
        return $this->belongsTo(Apply::class);
    }
}
