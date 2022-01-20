<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GiangVienController extends Controller
{
    public function giangvien()
    {
        return view('page.giangvien');
    }
    public function qlsinhvien()
    {
        return view('page.quanlysinhvien');
    }
}
