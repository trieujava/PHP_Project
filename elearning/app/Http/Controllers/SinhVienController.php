<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SinhVienController extends Controller
{
    public function sinhvien()
    {
        return view('page.sinhvien');
    }
    public function chitietlophoc()
    {
        return view('page.chitietlophoc');
    }
}
