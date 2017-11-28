<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhimtrongngayTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('phimtrongngay', function (Blueprint $table) {
            $table->increments('ptn_id');
            $table->unsignedInteger('nc_id');
            $table->unsignedInteger('lc_id');
            $table->unsignedInteger('pc_id');
            $table->unsignedInteger('phim_id');
            $table->unsignedInteger('rap_id');
            $table->foreign('nc_id')->references('nc_id')->on('ngaychieu')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('lc_id')->references('lc_id')->on('lichchieu')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('pc_id')->references('pc_id')->on('phongchieu')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('phim_id')->references('phim_id')->on('phim')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('rap_id')->references('rap_id')->on('rap')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('phimtrongngay');
    }
}
