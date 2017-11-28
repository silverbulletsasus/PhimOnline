<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ve', function (Blueprint $table) {
              $table->engine ='InnoDB';
              $table->increments('ve_id');
              $table->string('ve_tien');
              $table->unsignedInteger('kh_id');
              $table->unsignedInteger('ptn_id');
              $table->unsignedInteger('nv_id');
              $table->foreign('kh_id')->references('kh_id')->on('khachhang')->onDelete('cascade')->onUpdate('cascade');
              $table->foreign('ptn_id')->references('ptn_id')->on('phimtrongngay')->onDelete('cascade')->onUpdate('cascade');
              $table->foreign('nv_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('ve');
    }
}
