<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use App\Models\User;
use App\Models\Device;

class DevicePolicy extends Policy
{
    use HandlesAuthorization;
    public function update(User $user, Device $device)
    {
        if ($user->can('manage_contents')) {
            return true;
        }
    }

    public function destroy(User $user, Device $device)
    {
        if ($user->can('manage_contents')) {
            return true;
        }
    }
}
