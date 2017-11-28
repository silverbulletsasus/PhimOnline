<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            //$table->string('name');
            //$table->string('email')->unique();
            $table->string('nv_username')->unique();
            $table->string('password');
            $table->string('nv_email')->unique();
            $table->string('nv_ten');
            $table->string('nv_cmnd');
            $table->string('nv_diachi');
            $table->string('nv_sdt');
            $table->date('nv_ngaysinh');
            $table->unsignedTinyInteger('nv_gioitinh');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
