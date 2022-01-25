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
    //đăng nhập
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
                // return view('giang_vien');
                return redirect()->route('giangvien');
            } elseif ($user->tinh_trang == 2) {
                // return view('sinh_vien');
                return redirect()->route('sinhvien');
            } elseif ($user->tinh_trang == 0) {
                return redirect()->route('adm');
                // return view('adm');
            }
        } else {
            // return view('home.dang_nhap');
            return redirect()->route('dang_nhap');
        }
    }

    //đăng xuất
    public function getLogout()
    {
        Auth::logout();
        return redirect()->route('dang_nhap');
    }

    //quên mật khẩu
    public function fogot()
    {
        return view('home.quen_mat_khau');
    }

    public function getreset(Request $request)
    {
        $request->validate(
            [
                'email' => 'required|email',
            ],
            [
                'email.required' =>  "Bạn chưa nhập email ",
                'email.email' =>  "Định dạnh email không đúng ",
            ]
        );
        $user = TaiKhoan::where('email', $request->email)->first();
        if (empty($user) || $user->email != $request->email) {
            // return view('home.quen_mat_khau');
            return redirect()->route('quen_mat_khau')->with('title', 'Email không có trong bảng');
        }
        Mail::send('home.link_doi_mat_khau', compact('user'), function ($email) use ($user) {
            $email->to($user->email, $user->username);
            $email->subject('Elearning-Đổi mật khẩu');
            return redirect()->route('quen_mat_khau')->with('title', 'Email không có trong bảng');
        });
    }
    public function passnew($id)
    {
        $user = TaiKhoan::find($id);
        return view('home.mat_khau_moi', compact('user'));
    }
    public function reset_passnew(Request $request, $id)
    {
        $request->validate(
            [
                'password' => 'required|min:3|max:32',
                'passwordagain' => 'required|same:password',
            ],
            [
                'password.min' =>  'Mật khẩu phải có ít nhất 3 kí tự',
                'password.max' =>  'Mật khẩu chỉ được tối đa 30 kí tự',
                'password.required' =>  "Bạn chưa nhập mật khẩu ",
                'passwordagain.same' =>  'Mật khẩu không trùng khớp',
                'passwordagain.required' =>  "Bạn chưa nhập mật khẩu ",

            ]
        );
        $user = TaiKhoan::find($id);
        if ($request->password != $request->passwordagain) {
            return view('home.mat_khau_moi');
        } else {
            $user->password = Hash::make($request->password);
            $user->save();
            return redirect()->route('tao_mat_khau_moi', ['id' => $user->id])->with('title', 'Cập nhật thành công');
        }
    }
    //đăng kí
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
                'hoten' => 'required|min:3',
                'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            ],
            [
                'username.required' =>  'Bạn chưa nhập tên đăng nhập',
                'username.min' =>  'Tên người dùng phải có ít nhất 3 kí tự',
                'hoten.required' =>  'Bạn chưa nhập tên họ tên',
                'hoten.min' =>  'Họ tên phải có ít nhất 3 kí tự',
                'phone.required' =>  'Bạn chưa nhập SĐT',
                'phone.min' =>  'Bạn chưa nhập đúng định dạng SĐT',
                'phone.regex' =>  'SĐT chưa đúng định dạng',
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
        $tk->ho_ten = $request->hoten;
        $tk->phone = $request->phone;
        $tk->tinh_trang = 2;
        $tk->save();
        return redirect()->route('dang_ki')->with('thongbao', 'Chúc mừng bạn đã đăng kí thành công');
    }
    
}
