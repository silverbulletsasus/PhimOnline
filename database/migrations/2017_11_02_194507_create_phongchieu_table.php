<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhongchieuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('phongchieu', function (Blueprint $table) {
            $table->engine ='InnoDB';
            $table->increments('pc_id');
            $table->string('pc_ten');
            $table->unsignedInteger('pc_socho');
            $table->string('pc_dientich');
            $table->string('pc_tinhtrang');
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
        Schema::dropIfExists('phongchieu');
    }
}
