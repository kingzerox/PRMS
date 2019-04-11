<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\User;
use App\Models\Apply;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ApplyRequest;
use Illuminate\Support\Facades\DB;

class AppliesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['save', 'index','confirm']]);
    }

    public function index()
    {
        $applies = Apply::where('app_status_id', 1)->paginate(30);
        return view('applies.index', compact('applies'));
    }

	public function save(Request $request,Apply $apply)
	{
        $apply->device_id=\Request::get('device_id');
        $check=DB::table('devices')->where('id', $apply->device_id)->pluck('status_id');
        if($check[0]==1){
            $apply->user_id=Auth::id();
            $categories=DB::table('app_statuses')->where('id', 1)->increment('app_count', 1);
            $status=DB::table('devices')->where('id', $apply->device_id)->update(['status_id' => 2]);
            $apply->save();
            session()->flash('success', '申请成功');
    		return redirect()->route('root');
        }
            session()->flash('warning', '申请失败');
            return redirect()->route('root');
	}

	public function confirm(Request $request)
	{
		$id=(int)\Request::get('id');
        $app_status_id=(int)\Request::get('type');
        if($app_status_id==2){
            DB::table('applies')->where('id',$id)->update(['app_status_id'=>2]);
            session()->flash('success', '审核通过');
            return redirect()->route('applies.index');
        }
        DB::table('applies')->where('id',$id)->update(['app_status_id'=>3]);
		session()->flash('warning', '审核拒绝');
        return redirect()->route('applies.index');
	}
}
