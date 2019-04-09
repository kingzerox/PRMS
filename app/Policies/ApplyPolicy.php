<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Apply;

class ApplyPolicy extends Policy
{
    public function update(User $user, Apply $apply)
    {
        // return $apply->user_id == $user->id;
        return true;
    }

    public function destroy(User $user, Apply $apply)
    {
        return true;
    }
}
