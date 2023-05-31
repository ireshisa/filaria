<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnto4sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ento_4', function (Blueprint $table) {
            $table->increments('id');
            $table->string('district');
            $table->string('gn_division');
            $table->string('moh');
            $table->string('locality');
            $table->string('phi');
            $table->string('date_of_collection');
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
        Schema::dropIfExists('ento_4s');
    }
}