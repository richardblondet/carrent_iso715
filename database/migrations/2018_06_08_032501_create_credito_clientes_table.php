<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCreditoClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('credito_cliente', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre_tarjeta');
            $table->char('cvv', 4);
            $table->string('numberos');
            $table->string('tipo');
            $table->smallInteger('estado')->default( 1 );
            $table->float('limite_credito', 8, 2);
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
        Schema::dropIfExists('credito_cliente');
    }
}
