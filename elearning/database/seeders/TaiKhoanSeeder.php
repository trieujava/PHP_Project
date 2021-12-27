<?php

namespace Database\Seeders;

use App\Models\TaiKhoan;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class TaiKhoanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tk = new TaiKhoan();
        // $tk->email = 'admin@gmail.com';
        $tk->email = '0306191473@caothang.edu.vn';
        // $tk->email = 'giangvien@gmail.com';
        // $tk->username = 'admin';
        $tk->username = 'sinhvien';
        // $tk->username = 'giangvien';
        $tk->password = Hash::make('123456');
        $tk->ngay_tao = '2001/12/23';
        // $tk->tinh_trang = '1';
        // $tk->tinh_trang = '0';
        $tk->tinh_trang = '2';
        $tk->save();
    }
}
