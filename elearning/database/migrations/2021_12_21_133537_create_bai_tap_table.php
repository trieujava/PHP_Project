<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBaiTapTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bai_tap', function (Blueprint $table) {
            $table->Increments('id');
            $table->string('chu_de');
            $table->double('diem');
            $table->string('tieu_de');
            $table->string('huong_dan');
            $table->string('link_file');
            $table->string('link_zoom');
            $table->dateTime('ngay_dang');
            $table->dateTime('han_nop');
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
        Schema::dropIfExists('bai_tap');
    }
}
