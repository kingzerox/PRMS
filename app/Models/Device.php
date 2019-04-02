<?php

namespace App\Models;

class Device extends Model
{
    protected $fillable = ['title', 'body', 'user_id', 'dev_category_id', 'last_user_id', 'order'];
}
