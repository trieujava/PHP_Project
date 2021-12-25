<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTaiKhoanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tai_khoan', function (Blueprint $table) {
            $table->Increments('id');
            $table->string('email'); 
            $table->string('username');
            $table->string('password');
            $table->dateTime('ngay_tao');
            $table->boolean('tinh_trang'); 
            $table->timestamps();
            $table->rememberToken('');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tai_khoan');
    }
}
