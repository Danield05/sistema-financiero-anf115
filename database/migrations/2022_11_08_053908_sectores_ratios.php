<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SectoresRatios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sectors', function (Blueprint $table) {
            $table->double('razon_circulante');
            $table->double('prueba_acida');
            $table->double('rotacion_inventario');
            $table->double('rotacion_cuentas_por_cobrar');
            $table->double('grado_endeudamiento');
            $table->double('razon_endeudamiento_patrimonial');
            $table->double('rentabilidad_neta_del_patrimonio');
            $table->double('rentabilidad_del_activo');
            $table->double('rentabilidad_sobre_venta');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sectors', function (Blueprint $table) {
            $table->dropColumn('razon_circulante');
            $table->dropColumn('prueba_acida');
            $table->dropColumn('rotacion_inventario');
            $table->dropColumn('rotacion_cuentas_por_cobrar');
            $table->dropColumn('grado_endeudamiento');
            $table->dropColumn('razon_endeudamiento_patrimonial');
            $table->dropColumn('rentabilidad_del_activo');
            $table->dropColumn('rentabilidad_sobre_venta');
        });
    }
}
