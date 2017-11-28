<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKhachhangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('khachhang', function (Blueprint $table) {
            $table->engine ='InnoDB';
            $table->unsignedInteger('kh_id')->autoIncrement();
            $table->string('kh_username')->unique();
            $table->string('kh_password');
            $table->string('kh_email')->unique();
            $table->string('kh_hoten');
            $table->date('kh_ngaysinh');
            $table->string('kh_cmnd');
            $table->string('kh_diachi');
            $table->string('kh_sdt');
            $table->string('kh_makichhoat')->default('0');
            $table->unsignedTinyInteger('kh_tinhtrang')->default('0');
            $table->unsignedTinyInteger('kh_gioitinh');
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
        Schema::dropIfExists('khachhang');
    }
}
