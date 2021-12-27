<?php

use App\Http\Controllers\HomePageController;
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
    return view('home.dang_nhap');
});
Route::get('/dang-nhap', [HomePageController::class, 'getLogin'])->name('dang_nhap');
Route::post('/dang-nhap', [HomePageController::class, 'postLogin'])->name('post_dang_nhap');

Route::get('/dang-ki', [HomePageController::class, 'getdangki'])->name('dang_ki');
Route::post('/dang-ki', [HomePageController::class, 'postDangki'])->name('post_dang_ki');

Route::get('/dang-xuat', [HomePageController::class, 'getLogout'])->name('dang_xuat');


Route::get('/quen-mat-khau', [HomePageController::class, 'fogot'])->name('quen_mat_khau');
Route::get('/reset-mat-khau', [HomePageController::class, 'getreset'])->name('gui_mail');

Route::get('/mat-khau-moi', [HomePageController::class, 'passnew'])->name('mat_khau_moi');
