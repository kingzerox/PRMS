<?php

namespace App\Observers;

use App\Models\Device;

// creating, created, updating, updated, saving,
// saved,  deleting, deleted, restoring, restored

class DeviceObserver
{
    public function creating(Device $device)
    {
        //
    }

    public function updating(Device $device)
    {
        //
    }
    public function saving(Device $device)
    {
        // XSS 过滤
        $device->description = clean($device->description, 'user_topic_body');
    }
}
