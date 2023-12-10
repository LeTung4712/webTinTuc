<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UserController extends Controller
{
    public function Login()
    {
        if(Auth::user())
            return redirect('admin/');
        else
            return view('admin.login');
    }

    public function handleLogin(Request $request)
    {
        $this->validate($request,
            [
                'email' => 'required',
                'password' => 'required|min:6|max:32'
            ],
            [
                'email.required' => 'Bạn chưa nhập Địa chỉ Email!',
                'password.required' => 'Bạn chưa nhập Mật khẩu!',
                'password.min' => 'Mật Khẩu gồm tối thiểu 6 ký tự!',
                'password.max' => 'Mật Khẩu gồm tối đa 32 ký tự!'
            ]);

        if(Auth::attempt(['email' => $request->email, 'password' => $request->password]))
            return redirect('admin/');
        else
            return redirect('admin/login')->with('message','Sai tên đăng nhập hoặc mật khẩu!');
    }

    public function Logout()
    {
        Auth::logout();
        return redirect('admin/login');
    }
}
