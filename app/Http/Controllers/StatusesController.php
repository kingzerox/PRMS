<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Device;
use App\Models\Status;

class StatusesController extends Controller
{
    public function show(Status $status)
    {
        // 读取分类 ID 关联的话题，并按每 20 条分页
        $devices = Device::where('status_id', $status->id)->paginate(20);
        // 传参变量话题和分类到模板中
        return view('devices.index', compact('devices', 'status'));
    }
}
