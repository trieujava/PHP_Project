<?php

use Illuminate\Support\Facades\Route;
use  App\Http\Controllers\SinhVienController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('page.index');
})->name('trangchu');
Route::get('/sinh-vien', [SinhVienController::class,'layDanhSach']);
// Route::post('/sinh-vien/them_moi', [SinhVienController::class,'themMoi'])->name('xu-ly-them-moi');

//Form Login

Route::get('/login' , function () {return view('login');})->name('login');

//Admin
Route::get('/admin', function () {return view('page.admin');})->name('admin');
Route::get('/quanlysinhvien-admin', function () {return view('page.quanlyhethong');})->name('quanlyhethong');
Route::get('/quanlygiaovien', function () {return view('page.quanlygiaovien');})->name('quanlygiaovien');
Route::get('/danhsachlophoc', function () {return view('page.dslophoc');})->name('dslophoc');

//Giảng Viên
Route::get('/quanlysinhvien', function () {return view('page.quanlysinhvien');})->name('quanlysinhvien');
Route::get('/giangvien', function () {return view('page.giangvien');})->name('giangvien');

//SinhVien
Route::get('/sinhvien', function () {return view('page.sinhvien');})->name('sinhvien');
Route::get('/chitietlophoc', function () {return view('page.chitietlophoc');})->name('chitietlophoc');