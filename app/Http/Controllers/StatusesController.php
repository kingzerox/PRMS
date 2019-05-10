<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Device;
use App\Models\Status;

class StatusesController extends Controller
{
    public function show(Status $status)
    {
        $devices = Device::where('status_id', $status->id)->paginate(20);

        return view('devices.index', compact('devices', 'status'));
    }
}
