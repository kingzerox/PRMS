<?php

namespace App\Http\Requests;

use App\Models\User;
use App\Models\Reply;

class ReplyRequest extends Request
{
    public function rules()
    {
        return [
            'content' => 'required|min:2',
        ];
    }
}
