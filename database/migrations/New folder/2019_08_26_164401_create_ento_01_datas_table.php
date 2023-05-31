<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnto01DatasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ento_01_data', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('ento_01_id');
            $table->string('ser_no');
            $table->string('house_no');
            $table->string('no_of_mosq');
            $table->string('resting_place_1');
            $table->string('resting_place_2');
            $table->string('resting_place_3');
            $table->string('resting_place_4');
            $table->string('resting_place_5');
            $table->string('resting_place_6');
            $table->string('lab_positive');
            $table->string('lab_no');
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
        Schema::dropIfExists('ento_01_data');
    }
}
