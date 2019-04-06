<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Device;
use App\Models\DevCategory;
use App\Models\Status;
use App\Models\User;

class SearchDevController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }
    public function index()
    {
        $devcategory=\DB::table('dev_categories')->get();
        $status=\DB::table('statuses')->get();
        return view('search.index', compact('devcategory','status'));
    }
    public function show()
    {
        $devCategory_id=\Request::get('devCategory_id');
        $status_id=\Request::get('status_id');
        $device_name=\Request::get('device_name');
        $query = DB::table('devices');
        if (!empty($device_name)) {
            $query->where('title','like','%'.$device_name.'%');
        }
        if (!empty($status_id)) {
            $query->where('status_id',$status_id);
        }
        if (!empty($devCategory_id)) {
            $query->where('dev_category_id',$devCategory_id);
        }
        $devices=$query->get();
        return view('search.show',compact('devices'));
    }
}
