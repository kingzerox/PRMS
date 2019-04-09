<?php

namespace App\Http\Controllers;

use App\Models\Apply;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ApplyRequest;

class AppliesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

	public function store(ApplyRequest $request)
	{
		$apply = Apply::create($request->all());
		return redirect()->route('applies.show', $apply->id)->with('message', 'Created successfully.');
	}

	public function update(ApplyRequest $request, Apply $apply)
	{
		$this->authorize('update', $apply);
		$apply->update($request->all());

		return redirect()->route('applies.show', $apply->id)->with('message', 'Updated successfully.');
	}
}
