<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServiceClienteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_cliente', function (Blueprint $table) {
            $table->foreignId('service_id')->constrained();
            $table->foreignId('cliente_id')->constrained();
            $table->ipAddress('ip');
            $table->macAddress('mac');
            $table->date('fecha_inst');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('service_cliente');
    }
}
