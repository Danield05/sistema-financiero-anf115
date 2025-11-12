<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEstadoResultadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estado_resultados', function (Blueprint $table) {
            $table->id();
            $table->foreignId('periodo_id')->constrained('periodos')->onUpdate('cascade')->onDelete('cascade');
            $table->decimal('ventas')->default(0);
            $table->decimal('devolucion_sobre_ventas')->default(0);
            $table->decimal('costo_de_ventas')->default(0);
            $table->decimal('gastos_de_operacion')->default(0);
            $table->decimal('otros_ingresos')->default(0);
            $table->decimal('gastos_no_operativos')->default(0);
            $table->decimal('impuestos_sobre_la_renta')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('estado_resultados');
    }
}
