<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVehiculosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehiculos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->text('chassis');
            $table->string('numero_motor');
            $table->string('ano');
            $table->char('placa', 8);
            $table->integer('tipo_vehiculo_id')->unsigned();
            $table->foreign('tipo_vehiculo_id')->references('id')->on('tipos_vehiculos')->onDelete('cascade');
            $table->integer('marca_id')->unsigned();
            $table->foreign('marca_id')->references('id')->on('marcas')->onDelete('cascade');
            $table->integer('modelo_id')->unsigned();
            $table->foreign('modelo_id')->references('id')->on('modelos')->onDelete('cascade');
            $table->integer('tipo_combustible_id')->unsigned();
            $table->foreign('tipo_combustible_id')->references('id')->on('tipos_combustibles')->onDelete('cascade');
            $table->smallInteger('estado')->default( 1 );
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
        Schema::table('modelos', function( Blueprint $table) {
            $table->dropForeign(['tipo_vehiculo_id']);
            $table->dropColumn('tipo_vehiculo_id');
            $table->dropForeign(['marca_id']);
            $table->dropColumn('marca_id');
            $table->dropForeign(['modelo_id']);
            $table->dropColumn('modelo_id');
            $table->dropForeign(['tipo_combustible_id']);
            $table->dropColumn('tipo_combustible_id');
        });
        Schema::dropIfExists('vehiculos');
    }
}
