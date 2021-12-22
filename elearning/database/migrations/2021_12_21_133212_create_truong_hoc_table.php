<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTruongHocTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('truong_hoc', function (Blueprint $table) {
            $table->Increments('id');
            $table->string('ten_truong'); 
            $table->string('dia_chi'); 
            $table->dateTime('ngay_tao');
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
        Schema::dropIfExists('truong_hoc');
    }
}
