<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TaiKhoan;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function getLogin()
    {
        return view('login');
    }
    public function postLogin(Request $request)
    {
        $request->validate(
            [
                'username' => 'required|min:3',
                'password' => 'required|min:5|max:30'
            ],
            [
                'username.required' =>  'Bạn chưa nhập tên đăng nhập',
                'username.required' =>  'Tên người dùng phải có ít nhất 3 kí tự',
                'password.required' =>  'Mật khẩu phải có ít nhất 3 kí tự',
                'password.required' =>  'Mật khẩu chỉ được tối đa 30 kí tự',
                'password.required' =>  "Bạn chưa nhập mật khẩu ",
            ]
        );
        if (Auth::attempt(['username' => $request->username, 'password' => $request->password], $request->has('remember'))) {
            $user = TaiKhoan::where('username', $request->username)->first();
            if ($user->tinh_trang == 1) {
                return view('giang_vien');
                // return redirect()->route('adm');
            } elseif ($user->tinh_trang == 2) {
                return view('sinh_vien');
                // return redirect()->route('giang_vien');
            } elseif ($user->tinh_trang == 0) {
                // return redirect()->route('sinh_vien');
                return view('adm');
            }
        } else {
            return view('login');
            // return redirect()->route('login');
        }
    }
    public function getLogout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
    public function dangki()
    {
        return view('register');
    }
    // public  function postlangki()
    // {

    // }
}
