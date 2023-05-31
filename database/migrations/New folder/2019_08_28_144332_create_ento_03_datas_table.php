<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnto03DatasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ento_03_data', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('ent_03_id');
            $table->string('mosq_genus');
            $table->string('mosq_species');
            $table->integer('no_of_mosq');
            $table->double('density_per_trap');
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
        Schema::dropIfExists('ento_03_data');
    }
}