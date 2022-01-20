<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdmController extends Controller
{
    public function adm()
    {
        return view('page.adm');
    }
    public function dslophoc()
    {
        return view('page.dslophoc');
    }
    public function quanlygiaovien()
    {
        return view('page.quanlygiaovien');
    }
    public function quanlyhethong()
    {
        return view('page.quanlyhethong');
    }
}
