<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SeederPeriodos extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $periodos = [
            // Empresa 1 - Temporal
            ['anio' => '2020', 'empresa_id' => 1, 'gasto_financiero' => 5000.00, 'inversion_inicial' => 100000.00],
            ['anio' => '2021', 'empresa_id' => 1, 'gasto_financiero' => 5500.00, 'inversion_inicial' => 110000.00],
            ['anio' => '2022', 'empresa_id' => 1, 'gasto_financiero' => 6000.00, 'inversion_inicial' => 120000.00],

            // Empresa 2 - CENTA
            ['anio' => '2020', 'empresa_id' => 2, 'gasto_financiero' => 15000.00, 'inversion_inicial' => 500000.00],
            ['anio' => '2021', 'empresa_id' => 2, 'gasto_financiero' => 16500.00, 'inversion_inicial' => 550000.00],
            ['anio' => '2022', 'empresa_id' => 2, 'gasto_financiero' => 18000.00, 'inversion_inicial' => 600000.00],

            // Empresa 3 - Agrinter
            ['anio' => '2020', 'empresa_id' => 3, 'gasto_financiero' => 8000.00, 'inversion_inicial' => 200000.00],
            ['anio' => '2021', 'empresa_id' => 3, 'gasto_financiero' => 8800.00, 'inversion_inicial' => 220000.00],
            ['anio' => '2022', 'empresa_id' => 3, 'gasto_financiero' => 9600.00, 'inversion_inicial' => 240000.00],

            // Empresa 4 - Villavar
            ['anio' => '2020', 'empresa_id' => 4, 'gasto_financiero' => 12000.00, 'inversion_inicial' => 300000.00],
            ['anio' => '2021', 'empresa_id' => 4, 'gasto_financiero' => 13200.00, 'inversion_inicial' => 330000.00],
            ['anio' => '2022', 'empresa_id' => 4, 'gasto_financiero' => 14400.00, 'inversion_inicial' => 360000.00],

            // Empresa 5 - El surco
            ['anio' => '2020', 'empresa_id' => 5, 'gasto_financiero' => 10000.00, 'inversion_inicial' => 250000.00],
            ['anio' => '2021', 'empresa_id' => 5, 'gasto_financiero' => 11000.00, 'inversion_inicial' => 275000.00],
            ['anio' => '2022', 'empresa_id' => 5, 'gasto_financiero' => 12000.00, 'inversion_inicial' => 300000.00],
        ];

        foreach ($periodos as $periodo) {
            DB::table('periodos')->insert($periodo);
        }
    }
}