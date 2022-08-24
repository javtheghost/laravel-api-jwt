<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Pedidos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedidos', function (Blueprint $table) {
            $table->id();
            $table->integer('precio');
            $table->string('destinatario');
            $table->date('fecha_pedido');
            $table->date('fecha_entrega');
            $table->date('fecha_envio');
            $table->string('forma_envio');

            $table->string('direccion_destinatario');
            $table->integer('codigo_postal_destinatario');

            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');

            $table->bigInteger('empleado_id')->unsigned();
            $table->foreign('empleado_id')->references('id')->on('empleados');


            $table->bigInteger('compania_envio_id')->unsigned();
            $table->foreign('compania_envio_id')->references('id')->on('compania_envios');

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
        Schema::dropIfExists('pedidos');
    }
}
