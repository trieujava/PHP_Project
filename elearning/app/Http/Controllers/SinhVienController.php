<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TaiKoan;
class SinhVienController extends Controller
{
    function layDanhSach()
    {
      return view('danh-sach-sinh-vien');
    }
    
    public function themMoi(Request $req)
    {
      return "hello";
      // $sinhVien= new SinhVien;
      // $tai_khoan->ten_tai_khoan=$req ->Username;
      // $tai_khoan->mat_khau=$req->
        
    }
}
