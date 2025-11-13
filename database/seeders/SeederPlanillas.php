<?php

namespace Database\Seeders;

use App\Models\PlanillaSueldo;
use Illuminate\Database\Seeder;

class SeederPlanillas extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $planillas = [
            [
                'empleado_id' => 1, // Juan Pérez
                'periodo' => '2025-10',
                'fecha_inicio' => '2025-10-01',
                'fecha_fin' => '2025-10-15',
                'dias_laborados' => 15,
                'dias_faltados_con_permiso' => 0,
                'dias_faltados_sin_permiso' => 0,
                'salario_base' => 800.00,
                'afp_empleado' => 57.60, // 7.2% of 800
                'iss_empleado' => 24.00, // 3% of 800 (capped at 1000)
                'renta' => 0, // No tax for this salary
                'aguinaldo' => 66.67, // (800/12) * 1 month
                'vacaciones' => 133.33, // (800/30) * 5 days vacation
                'total_deducciones' => 81.60,
                'sueldo_neto' => 918.40,
            ],
            [
                'empleado_id' => 2, // María González
                'periodo' => '2025-10',
                'fecha_inicio' => '2025-10-01',
                'fecha_fin' => '2025-10-15',
                'dias_laborados' => 13,
                'dias_faltados_con_permiso' => 1,
                'dias_faltados_sin_permiso' => 1,
                'salario_base' => 625.00, // Prorated: (750/15) * 12.5 = 625
                'afp_empleado' => 45.00,
                'iss_empleado' => 18.75,
                'renta' => 0,
                'aguinaldo' => 52.08,
                'vacaciones' => 104.17,
                'total_deducciones' => 63.75,
                'sueldo_neto' => 717.50,
            ],
            [
                'empleado_id' => 3, // Carlos Rodríguez
                'periodo' => '2025-10',
                'fecha_inicio' => '2025-10-01',
                'fecha_fin' => '2025-10-15',
                'dias_laborados' => 15,
                'dias_faltados_con_permiso' => 0,
                'dias_faltados_sin_permiso' => 0,
                'salario_base' => 900.00,
                'afp_empleado' => 64.80,
                'iss_empleado' => 27.00,
                'renta' => 0,
                'aguinaldo' => 75.00,
                'vacaciones' => 150.00,
                'total_deducciones' => 91.80,
                'sueldo_neto' => 1033.20,
            ],
            [
                'empleado_id' => 4, // Ana Martínez
                'periodo' => '2025-09',
                'fecha_inicio' => '2025-09-16',
                'fecha_fin' => '2025-09-30',
                'dias_laborados' => 15,
                'dias_faltados_con_permiso' => 0,
                'dias_faltados_sin_permiso' => 0,
                'salario_base' => 700.00,
                'afp_empleado' => 50.40,
                'iss_empleado' => 21.00,
                'renta' => 0,
                'aguinaldo' => 58.33,
                'vacaciones' => 116.67,
                'total_deducciones' => 71.40,
                'sueldo_neto' => 803.60,
            ],
            [
                'empleado_id' => 5, // Luis Hernández
                'periodo' => '2025-09',
                'fecha_inicio' => '2025-09-16',
                'fecha_fin' => '2025-09-30',
                'dias_laborados' => 12,
                'dias_faltados_con_permiso' => 2,
                'dias_faltados_sin_permiso' => 1,
                'salario_base' => 680.00, // Prorated: (850/15) * 12 = 680
                'afp_empleado' => 48.96,
                'iss_empleado' => 20.40,
                'renta' => 0,
                'aguinaldo' => 56.67,
                'vacaciones' => 113.33,
                'total_deducciones' => 69.36,
                'sueldo_neto' => 780.64,
            ]
        ];

        foreach ($planillas as $planilla) {
            PlanillaSueldo::create($planilla);
        }
    }
}
