<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnto02DatasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ento_02_data', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('ento_02_id');
            $table->string('date');
            $table->string('serial_no');
            $table->string('moh_area');
            $table->string('gn_division');
            $table->string('chief_occupant');
            $table->string('address');
            $table->double('gps_lat');
            $table->double('gps_long');
            $table->integer('total_cx_quin');
            $table->string('mosq_pcr');
            $table->string('mosq_dis');
            $table->string('tube_no');
            $table->string('pcr_date_rec');
            $table->string('pcr_ref');
            $table->string('pcr_date_test');
            $table->integer('pcr_remarks');
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
        Schema::dropIfExists('ento_02_datas');
    }
}