<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDistrictToEnto05 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('ento_05', function(Blueprint $table) {
       $table->string('district');
    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */

    public function down()
    {

      Schema::table('ento_05', function(Blueprint $table) {
        $table->dropColumn('district');

    });
}

}