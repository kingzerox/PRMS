<?php

namespace App\Policies;

use App\Models\Apply;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ApplyPolicy extends Policy
{
    use HandlesAuthorization;
    public function update(User $user,Apply $apply)
    {
        if ($user->hasAnyRole(Role::all())) {
            return true;
        }
    }

    public function view(User $user)
    {
        if ($user->hasAnyRole(Role::all())) {
            return true;
        }
    }
}
