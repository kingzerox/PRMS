<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Device;
use App\Models\DevCategory;

class DevCategoriesController extends Controller
{
    public function show(DevCategory $devcategory)
    {
        $devices = Device::where('dev_category_id', $devcategory->id)->paginate(20);
        return view('devices.index', compact('devices', 'devcategory'));
    }
}

