<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInspeccionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inspeccion', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('vehiculo_id')->unsigned();
            $table->foreign('vehiculo_id')->references('id')->on('vehiculos')->onDelete('cascade');
            $table->smallInteger('tiene_rayaduras')->default( 0 );
            $table->string('estado_combustible');
            $table->smallInteger('goma_repuesta')->default( 0 );
            $table->smallInteger('gato')->default( 0 );
            $table->smallInteger('cristales_rotos')->default( 0 );
            $table->smallInteger('estado_gomas')->default( 0 );
            $table->integer('empleado_id')->unsigned();
            $table->foreign('empleado_id')->references('id')->on('users')->onDelete('cascade');
            $table->smallInteger('estado')->default( 0 );
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
        Schema::dropIfExists('inspeccion');
    }
}
