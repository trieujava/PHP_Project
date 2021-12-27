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
    return view('dang_nhap');
});
Route::get('/login', [HomePageController::class, 'getLogin'])->name('dang_nhap');
Route::post('/login', [HomePageController::class, 'postLogin'])->name('post_dang_nhap');
// Route::get('/dangki', [LoginController::class, 'getdangki'])->name('dangki');
// Route::post('/dangki', [LoginController::class, 'postDangki'])->name('postlangki');

Route::get('/logout', [HomePageController::class, 'getLogout'])->name('dang_xuat');


Route::get('/fogot_password', [HomePageController::class, 'fogot'])->name('quen_mat_khau');
Route::get('/reset_password', [HomePageController::class, 'getreset'])->name('gui_mail');

Route::get('/passnew', [HomePageController::class, 'passnew'])->name('mat_khau_moi');
