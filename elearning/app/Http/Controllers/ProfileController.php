<?php

namespace App\Http\Controllers;

use App\Models\TaiKhoan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class ProfileController extends Controller
{
    public function edit($id)
    {
        $user = TaiKhoan::findOrFail($id);
        return view('intro.show', compact('user'));
    }
    public function update(Request $request, $id)
    {
        $request->validate(
            [

                'email' => 'email',
                'hoten' => 'min:3',
                'phone' => 'regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            ],
            [

                'hoten.min' =>  'Họ tên phải có ít nhất 3 kí tự',
                'phone.min' =>  'Bạn chưa nhập đúng định dạng SĐT',
                'phone.regex' =>  'SĐT chưa đúng định dạng',
                'email.email' =>  'Bạn chưa nhập đúng định dạng email',

            ]
        );
        $user = TaiKhoan::find($id);
        $user->email = $request->email;
        $user->ho_ten = $request->hoten;
        $user->phone = $request->phone;
        $user->save();
        session()->flash('thongbao', 'Cập nhật thành công');
        return back();
    }
    public function doipass()
    {

        return view('intro.doi_pass');
    }
    public function capnhatpass(Request $request)
    {
        $request->validate(
            [
                'password_old' => 'required|min:6|max:20',
                'password_new' => 'required|min:6|max:20',
                'password_confirm' => 'required|same:password_new',
            ],
            [

                'password_old.required' => 'Mật khẩu cũ không được bỏ trống',
                'password_old.min' => 'Mật khẩu cũ phải có ít nhất 6 kí tự ',
                'password_old.max' => 'Mật khẩu cũ phải có lớn hơn 20 kí tự ',
                'password_new.required' => 'Mật khẩu mới không được bỏ trống',
                'password_new.min' => 'Mật khẩu mới phải có ít nhất 6 kí tự ',
                'password_new.max' => 'Mật khẩu mới phải có lớn hơn 20 kí tự ',
                'password_confirm.required' => 'Mật khẩu nhập lại không được bỏ trống',
                'password_confirm.same' => 'Mật khẩu nhập lại không đúng',
            ]
        );
        $user = TaiKhoan::find(auth()->id());
        $password_old = auth()->user()->password;

        if (Hash::check($request->password_old, $password_old)) {

            if (!Hash::check($request->password_new, $password_old)) {
                $user->password = Hash::make($request->password_new);
                $user->save();
                session()->flash('message', 'Đổi mật khẩu thành công');
                return back();
            } else {
                session()->flash('message', 'Mật khẩu cũ trùng với mật khẩu mới');
                return back();
            }
        } else {
            session()->flash('message', 'Mật khẩu cũ không đúng');
            return back();
        }
    }
}
