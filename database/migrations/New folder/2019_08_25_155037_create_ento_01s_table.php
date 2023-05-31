<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnto01sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ento_01', function (Blueprint $table) {
            $table->increments('ento_01_id');
            $table->string('distrcit');
            $table->string('gn_divison');
            $table->string('date');
            $table->string('moh_area');
            $table->string('locality');
            $table->string('start_at');
            $table->string('phi_and_phm');
            $table->string('weather_condition');
            $table->string('finished_at');
            $table->integer('no_of_premises');
            $table->string('total_time_spend');
            $table->integer('no_of_premises_positive');
            $table->integer('mansonia_species_of_positive');
            $table->integer('total_mosquitos_collected');
            $table->integer('mansonia_spcies_of_mosquitos_collected');
            $table->integer('anopheles_species');
            $table->integer('aedes_sp');
            $table->integer('armigerus_sp');
            $table->integer('tubes_submitted');
            $table->integer('no_of_collectors');
            $table->string('name_of_heo');
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
        Schema::dropIfExists('ento_01s');
    }
}
