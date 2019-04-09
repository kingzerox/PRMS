<?php

namespace App\Http\Controllers;
use Auth;
use App\Models\Device;
use App\Models\DevCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\DeviceRequest;
use App\Handlers\ImageUploadHandler;
use Carbon\Carbon;

class DevicesController extends Controller
{
    public function __construct()
    {

    }

	public function index()
	{
		$devices = Device::with('user', 'devcategory','status')->paginate(30);
		return view('devices.index', compact('devices'));
	}

    public function show(Device $device)
    {
        return view('devices.show', compact('device'));
    }

	public function create(Device $device)
	{
        $devcategories = DevCategory::all();
		return view('devices.create_and_edit', compact('device','devcategories'));
	}

	public function store(DeviceRequest $request,Device $device)
	{
		$device->fill($request->all());
        $device->save();
		return redirect()->route('devices.show', $device->id)->with('message', '添加成功');
	}

	public function edit(Device $device)
	{
        $this->authorize('update', $device);
        $devcategories = DevCategory::all();
		return view('devices.create_and_edit', compact('device','devcategories'));
	}

	public function update(DeviceRequest $request, Device $device)
	{
		$this->authorize('update', $device);
		$device->update($request->all());

		return redirect()->route('devices.show', $device->id)->with('message', '更新成功.');
	}

	public function destroy(Device $device)
	{
		$this->authorize('destroy', $device);
		$device->delete();

		return redirect()->route('devices.index')->with('message', '删除成功');
	}

    public function uploadImage(Request $request, ImageUploadHandler $uploader)
    {
        // 初始化返回数据，默认是失败的
        $data = [
            'success'   => false,
            'msg'       => '上传失败!',
            'file_path' => ''
        ];
        // 判断是否有上传文件，并赋值给 $file
        if ($file = $request->upload_file) {
            // 保存图片到本地
            $result = $uploader->save($request->upload_file, 'devices', \Auth::id(), 1024);
            // 图片保存成功的话
            if ($result) {
                $data['file_path'] = $result['path'];
                $data['msg']       = "上传成功!";
                $data['success']   = true;
            }
        }
        return $data;
    }


}
