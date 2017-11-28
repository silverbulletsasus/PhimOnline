<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhimTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('phim', function (Blueprint $table) {
            $table->engine ='InnoDB';
            $table->increments('phim_id');
            $table->string('phim_ten');
            $table->string('phim_poster');
            $table->string('phim_thoiluong');
            $table->string('phim_daodien');
            $table->string('phim_dienvien');
            $table->string('phim_ngaykhoichieu');
            $table->string('phim_noidung');
            $table->string('phim_trailer');
            $table->unsignedInteger('tl_id');
            $table->foreign('tl_id')->references('tl_id')->on('theloai')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('phim');
    }
}
