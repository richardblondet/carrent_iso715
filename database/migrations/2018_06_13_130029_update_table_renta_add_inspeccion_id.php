<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateTableRentaAddInspeccionId extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('renta', function (Blueprint $table) {
            $table->integer('inspeccion_id')->unsigned();
            $table->foreign('inspeccion_id')->references('id')->on('inspeccion');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('renta', function (Blueprint $table) {
            $table->dropForeign(['inspeccion_id']);
            $table->dropColumn('inspeccion_id');
        });
    }
}
