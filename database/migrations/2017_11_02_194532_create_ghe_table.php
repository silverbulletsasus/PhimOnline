<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGheTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ghe', function (Blueprint $table) {
            $table->engine ='InnoDB';
            $table->increments('ghe_id');
            $table->string('ghe_ten');
            $table->string('ghe_tinhtrang');
            $table->unsignedInteger('pc_id');
            $table->foreign('pc_id')->references('pc_id')->on('phongchieu')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('ghe');
    }
}
