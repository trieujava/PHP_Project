<?php

use App\Http\Controllers\LoginController;
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
    return view('login');
});
Route::get('/login', [LoginController::class, 'getLogin'])->name('login');
Route::post('/login', [LoginController::class, 'postLogin'])->name('postlogin');

// Route::get('/dangki', [LoginController::class, 'getdangki'])->name('dangki');
// Route::post('/dangki', [LoginController::class, 'postDangki'])->name('postlangki');

Route::get('/logout', [LoginController::class, 'getLogout'])->name('logout');
