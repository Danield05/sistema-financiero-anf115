<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SeederPresupuestos extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $presupuestos = [
            // Empresa 1 - Temporal - Periodo 2020 (ID 1)
            [
                'tipo' => 'ventas',
                'periodo_id' => 1,
                'empresa_id' => 1,
                'descripcion' => 'Presupuesto de ventas 2020',
                'monto_presupuestado' => 50000.00,
                'monto_real' => 45000.00,
                'fecha_inicio' => '2020-01-01',
                'fecha_fin' => '2020-12-31'
            ],
            [
                'tipo' => 'general',
                'periodo_id' => 1,
                'empresa_id' => 1,
                'descripcion' => 'Presupuesto general 2020',
                'monto_presupuestado' => 100000.00,
                'monto_real' => 95000.00,
                'fecha_inicio' => '2020-01-01',
                'fecha_fin' => '2020-12-31'
            ],

            // Empresa 2 - CENTA - Periodo 2020 (ID 4)
            [
                'tipo' => 'ventas',
                'periodo_id' => 4,
                'empresa_id' => 2,
                'descripcion' => 'Presupuesto de ventas 2020',
                'monto_presupuestado' => 200000.00,
                'monto_real' => 185000.00,
                'fecha_inicio' => '2020-01-01',
                'fecha_fin' => '2020-12-31'
            ],
            [
                'tipo' => 'produccion',
                'periodo_id' => 4,
                'empresa_id' => 2,
                'descripcion' => 'Presupuesto de producción 2020',
                'monto_presupuestado' => 150000.00,
                'monto_real' => 140000.00,
                'fecha_inicio' => '2020-01-01',
                'fecha_fin' => '2020-12-31'
            ],

            // Empresa 3 - Agrinter - Periodo 2020 (ID 7)
            [
                'tipo' => 'ventas',
                'periodo_id' => 7,
                'empresa_id' => 3,
                'descripcion' => 'Presupuesto de ventas 2020',
                'monto_presupuestado' => 80000.00,
                'monto_real' => 75000.00,
                'fecha_inicio' => '2020-01-01',
                'fecha_fin' => '2020-12-31'
            ],

            // Empresa 4 - Villavar - Periodo 2020 (ID 10)
            [
                'tipo' => 'general',
                'periodo_id' => 10,
                'empresa_id' => 4,
                'descripcion' => 'Presupuesto general 2020',
                'monto_presupuestado' => 120000.00,
                'monto_real' => 115000.00,
                'fecha_inicio' => '2020-01-01',
                'fecha_fin' => '2020-12-31'
            ],

            // Empresa 5 - El surco - Periodo 2020 (ID 13)
            [
                'tipo' => 'ventas',
                'periodo_id' => 13,
                'empresa_id' => 5,
                'descripcion' => 'Presupuesto de ventas 2020',
                'monto_presupuestado' => 90000.00,
                'monto_real' => 85000.00,
                'fecha_inicio' => '2020-01-01',
                'fecha_fin' => '2020-12-31'
            ],
        ];

        foreach ($presupuestos as $presupuesto) {
            DB::table('presupuestos')->insert($presupuesto);
        }
    }
}