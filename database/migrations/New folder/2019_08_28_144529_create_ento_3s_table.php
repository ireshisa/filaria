<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnto3sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ento_03', function (Blueprint $table) {
            $table->increments('ent_03_id');
            $table->string('district');
            $table->string('moh');
            $table->string('address');
            $table->string('date_of_collection');
            $table->string('phi');
            $table->string('time_of_bait');
            $table->string('gn');
            $table->string('start_time_of_col');
            $table->integer('no_of_mosq_sp');
            $table->integer('total_no_of_mosq');
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
        Schema::dropIfExists('ento_03');
    }
}