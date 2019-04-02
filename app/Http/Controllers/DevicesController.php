<?php

namespace App\Http\Controllers;

use App\Models\Device;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\DeviceRequest;

class DevicesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

	public function index()
	{
		$devices = Device::paginate();
		return view('devices.index', compact('devices'));
	}

    public function show(Device $device)
    {
        return view('devices.show', compact('device'));
    }

	public function create(Device $device)
	{
		return view('devices.create_and_edit', compact('device'));
	}

	public function store(DeviceRequest $request)
	{
		$device = Device::create($request->all());
		return redirect()->route('devices.show', $device->id)->with('message', 'Created successfully.');
	}

	public function edit(Device $device)
	{
        $this->authorize('update', $device);
		return view('devices.create_and_edit', compact('device'));
	}

	public function update(DeviceRequest $request, Device $device)
	{
		$this->authorize('update', $device);
		$device->update($request->all());

		return redirect()->route('devices.show', $device->id)->with('message', 'Updated successfully.');
	}

	public function destroy(Device $device)
	{
		$this->authorize('destroy', $device);
		$device->delete();

		return redirect()->route('devices.index')->with('message', 'Deleted successfully.');
	}
}