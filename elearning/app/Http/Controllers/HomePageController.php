<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TaiKhoan;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class HomePageController extends Controller
{
    public function getLogin()
    {
        return view('home.dang_nhap');
    }
    public function postLogin(Request $request)
    {
        $request->validate(
            [
                'username' => 'required|min:3',
                'password' => 'required|min:3|max:30'
            ],
            [
                'username.required' =>  'Bạn chưa nhập tên đăng nhập',
                'username.min' =>  'Tên người dùng phải có ít nhất 3 kí tự',
                'password.min' =>  'Mật khẩu phải có ít nhất 3 kí tự',
                'password.max' =>  'Mật khẩu chỉ được tối đa 30 kí tự',
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
            return view('home.dang_nhap');
            // return redirect()->route('login');
        }
    }
    public function getLogout()
    {
        Auth::logout();
        return redirect()->route('dang_nhap');
    }
    public function fogot()
    {
        return view('home.quen_mat_khau');
    }
    public function getreset(Request $request)
    {
        $user = TaiKhoan::where('email', $request->email)->first();
        if (empty($user) || $user->email != $request->email) {
            $title = "Email không tồn tại";
            return view("home.quen_mat_khau", compact("title"));
        }
        $name = 'Doi mat khau';
        Mail::send('home.link_doi_mat_khau', compact('name'), function ($email) {
            $email->to('0306191473@caothang.edu.vn', 'He Thong');
            $email->subject('Elearning-Đổi mật khẩu');
        });
    }
    public function passnew()
    {
        return view('home.mat_khau_moi');
    }
    public function getdangki()
    {
        return view('home.dang_ki');
    }
    public function postDangki(Request $request)
    {
        $request->validate(
            [
                'username' => 'required|min:3',
                'email' => 'required|email|unique:App\Models\TaiKhoan,email',
                'password' => 'required|min:3|max:32',
                'passwordagain' => 'required|same:password',
            ],
            [
                'username.required' =>  'Bạn chưa nhập tên đăng nhập',
                'username.min' =>  'Tên người dùng phải có ít nhất 3 kí tự',
                'email.required' =>  'Bạn chưa nhập email',
                'email.email' =>  'Bạn chưa nhập đúng định dạng email',
                'email.unique' =>  'Email đã tồn tại',
                'password.min' =>  'Mật khẩu phải có ít nhất 3 kí tự',
                'password.max' =>  'Mật khẩu chỉ được tối đa 30 kí tự',
                'password.required' =>  "Bạn chưa nhập mật khẩu ",
                'passwordagain.same' =>  'Mật khẩu không trùng khớp',
                'passwordagain.required' =>  "Bạn chưa nhập mật khẩu ",
            ]
        );
        $tk = new TaiKhoan();

        $tk->username = $request->username;
        $tk->email = $request->email;
        $tk->password = Hash::make($request->password);
        $tk->tinh_trang = 2;
        $tk->save();
        return redirect()->route('dang_nhap')->with('thongbao', 'Chúc mừng bạn đã đăng kí thành công');
    }
}
