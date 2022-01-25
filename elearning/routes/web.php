<?php

use App\Http\Controllers\HomePageController;
use App\Http\Controllers\SinhVienController;
use App\Http\Controllers\AdmController;
use App\Http\Controllers\GiangVienController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\LoginController;

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

//đăng nhập
Route::get('/dang-nhap', [HomePageController::class, 'getLogin'])->name('dang_nhap'); //->middleware('guest');
Route::post('/dang-nhap', [HomePageController::class, 'postLogin'])->name('post_dang_nhap');

//đăng kí
Route::get('/dang-ki', [HomePageController::class, 'getdangki'])->name('dang_ki');
Route::post('/dang-ki', [HomePageController::class, 'postDangki'])->name('post_dang_ki');

//đăng xuất
Route::get('/dang-xuat', [HomePageController::class, 'getLogout'])->name('dang_xuat');

//quên mật khẩu gửi mail
Route::get('/quen-mat-khau', [HomePageController::class, 'fogot'])->name('quen_mat_khau');
Route::post('/quen-mat-khau', [HomePageController::class, 'getreset'])->name('xl_mat_khau');
Route::get('/mat-khau-moi/{id}', [HomePageController::class, 'passnew'])->name('mat_khau_moi');
Route::post('/mat-khau-moi/{id}', [HomePageController::class, 'reset_passnew'])->name('tao_mat_khau_moi');

//đổi mật khẩu
Route::get('/doi-mat-khau', [ProfileController::class, 'doipass'])->name('edit_matkhau');
Route::post('/doi-mat-khau', [ProfileController::class, 'capnhatpass'])->name('update_matkhau');
//admin
Route::get('/adm', [AdmController::class, 'adm'])->name('adm')->middleware('auth');
Route::get('/adm/ds-lophoc', [AdmController::class, 'dslophoc'])->name('dslophoc');
Route::get('/adm/quanli-giaovien', [AdmController::class, 'quanlygiaovien'])->name('qlgiaovien');
Route::get('/adm/quanli-hethong', [AdmController::class, 'quanlyhethong'])->name('qlhethong');


//giang vien
Route::get('/giang-vien', [GiangVienController::class, 'giangvien'])->name('giangvien')->middleware('auth');
Route::get('/giang-vien/quanli-sinhvien', [GiangVienController::class, 'giangvien'])->name('qlsinhvien');

//sinh vien
Route::get('/sinh-vien', [SinhVienController::class, 'sinhvien'])->name('sinhvien')->middleware('auth');
Route::get('/sinh-vien/chitiet-lophoc', [SinhVienController::class, 'chitietlophoc'])->name('chitietlophoc');

//profile
Route::get('/profile/{id}', [ProfileController::class, 'edit'])->name('edit');
Route::post('/profile/{id}', [ProfileController::class, 'update'])->name('update');
