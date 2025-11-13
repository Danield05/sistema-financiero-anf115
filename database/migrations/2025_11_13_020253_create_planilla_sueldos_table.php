<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlanillaSueldosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('planilla_sueldos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('empleado_id')->constrained('empleados')->onDelete('cascade');
            $table->string('periodo'); // ej: 2023-12
            $table->decimal('salario_base', 10, 2);
            $table->decimal('afp_empleado', 10, 2)->default(0);
            $table->decimal('iss_empleado', 10, 2)->default(0);
            $table->decimal('renta', 10, 2)->default(0);
            $table->decimal('aguinaldo', 10, 2)->default(0);
            $table->decimal('vacaciones', 10, 2)->default(0);
            $table->decimal('total_deducciones', 10, 2)->default(0);
            $table->decimal('sueldo_neto', 10, 2);
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
        Schema::dropIfExists('planilla_sueldos');
    }
}
