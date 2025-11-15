<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateInventariosTableRemoveOldFieldsAddDateRange extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('inventarios', function (Blueprint $table) {
            $table->dropColumn(['cantidad', 'costo_unitario', 'tipo_movimiento', 'fecha']);
            $table->date('fecha_inicio')->nullable();
            $table->date('fecha_fin')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('inventarios', function (Blueprint $table) {
            $table->dropColumn(['fecha_inicio', 'fecha_fin']);
            $table->integer('cantidad');
            $table->decimal('costo_unitario', 10, 2);
            $table->enum('tipo_movimiento', ['entrada', 'salida']);
            $table->date('fecha');
        });
    }
}
