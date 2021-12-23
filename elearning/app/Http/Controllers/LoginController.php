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
        $user = TaiKhoan::where('ten_tai_khoan', $request->Username)->first();
        if (empty($user)) {
            return view('login');
        } elseif (!Hash::check($request->Password, $user->mat_khau)) {
            return view('login');
        } else {
            return view('giang_vien');
        }
    }
}
