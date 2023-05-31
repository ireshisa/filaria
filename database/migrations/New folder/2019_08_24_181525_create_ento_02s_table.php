<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnto02sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ento_02', function (Blueprint $table) {
            $table->increments('ento_02_id');
            $table->string('district');
            $table->string('method');
            $table->integer('total_cx_quin_mosq');
            $table->integer('total_traps');
            $table->double('mosq_density_per_trap');
            $table->string('heo');
            $table->string('date');
            $table->string('rmo_ent');
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
        Schema::dropIfExists('ento_02');
    }
}