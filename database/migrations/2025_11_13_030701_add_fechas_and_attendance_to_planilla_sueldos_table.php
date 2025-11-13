<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFechasAndAttendanceToPlanillaSueldosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('planilla_sueldos', function (Blueprint $table) {
            $table->date('fecha_inicio')->nullable();
            $table->date('fecha_fin')->nullable();
            $table->integer('dias_laborados')->default(0);
            $table->integer('dias_faltados_con_permiso')->default(0);
            $table->integer('dias_faltados_sin_permiso')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('planilla_sueldos', function (Blueprint $table) {
            $table->dropColumn(['fecha_inicio', 'fecha_fin', 'dias_laborados', 'dias_faltados_con_permiso', 'dias_faltados_sin_permiso']);
        });
    }
}
