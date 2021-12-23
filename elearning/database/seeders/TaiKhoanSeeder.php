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
        $tk =new TaiKhoan();
        $tk->email='admin@gmail.com';
        $tk->ten_tai_khoan='admin';
        // $tk->mat_khau=Hash::make('123456');
        $tk->mat_khau=('123456');
        $tk->ngay_tao='2001/12/23';
        $tk->tinh_trang='1';
        $tk->save();
        // DB::table('tai_khoan')->insert(
        //     [
        //         'email' => 'admin@gmail.com',
        //         'ten_tai_khoan' => 'admin',
        //         'mat_khau' => Hash::make('123456'),
        //         'ngay_tao' => 21 / 12 / 2021,
        //         'tinh_trang' => 1
        //     ]
        // );
    }
}
