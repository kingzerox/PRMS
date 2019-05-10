<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\UserRequest;
use App\Handlers\ImageUploadHandler;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Auth;

class UsersController extends Controller
{
    use ResetsPasswords;
    //限制游客
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['show']]);
    }
    //用户资料
    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }
    //修改资料
    public function edit(User $user)
    {
        $this->authorize('update', $user);
        return view('users.edit', compact('user'));
    }
    //资料更新
    public function update(UserRequest $request, ImageUploadHandler $uploader, User $user)
    {
        $this->authorize('update', $user);
        $data = $request->all();

        if ($request->avatar) {
            $result = $uploader->save($request->avatar, 'avatars', $user->id);
            if ($result) {
                $data['avatar'] = $result['path'];
            }
        }

        $user->update($data);
        return redirect()->route('users.show', $user->id)->with('success', '个人资料更新成功！');
    }
    public function showreset(User $user)
    {
        return view('users.reset', compact('user'));
    }
    public function reset(Request $request)
    {
        $oldpassword=\Request::get('oldpassword');
        $password=\Request::get('password');
        $passwordconfirm=\Request::get('password_confirmation');
        if(Auth::attempt(['id' => Auth::id(), 'password' => $oldpassword]))
        {
            if($password==$passwordconfirm){
                $this->resetPassword(Auth::user(),$password);
                session()->flash('success', '修改成功');
                return redirect()->route('root');
            }
            session()->flash('warning', '新密码不一致');
            return view('users.reset', compact('user'));
        }
        session()->flash('warning', '旧密码错误');
        return view('users.reset', compact('user'));
    }
}
