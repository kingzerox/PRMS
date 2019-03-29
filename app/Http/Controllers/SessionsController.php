<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class SessionsController extends Controller
{
    public function create()
    {
        return view('auth.login');
    }

    public function store(Request $request)
    {
       $credentials = $this->validate($request, [
           'sid' => 'required|max:12',
           'password' => 'required'
       ]);
        if (Auth::attempt($credentials)) {
           session()->flash('success', '欢迎回来！');
           return redirect()->route('users.show', [Auth::user()]);
       } else {
           session()->flash('danger', '很抱歉，您的账号和密码不匹配');
           return redirect()->back()->withInput();
       }

       return;
    }
}
