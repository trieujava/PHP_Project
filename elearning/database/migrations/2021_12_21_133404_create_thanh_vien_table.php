<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateThanhVienTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('thanh_vien', function (Blueprint $table) {
            $table->Increments('id');
            $table->integer('id_acc');
            $table->integer('id_edu');
            $table->integer('id_lop');
            $table->string('ho_ten');
            $table->string('gioi_tinh');
            $table->string('email');
            $table->string('phan_quyen');
            $table->boolean('tinh_trang');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('thanh_vien');
    }
}
