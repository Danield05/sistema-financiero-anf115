<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SeederCuentas extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cuentas = [
            // Empresa 1 - Temporal
            ['empresa_id' => 1, 'codigo' => '1.01.01', 'nombre' => 'Caja', 'tipo' => 1, 'padre' => null],
            ['empresa_id' => 1, 'codigo' => '1.01.02', 'nombre' => 'Bancos', 'tipo' => 1, 'padre' => null],
            ['empresa_id' => 1, 'codigo' => '1.02.01', 'nombre' => 'Cuentas por cobrar', 'tipo' => 1, 'padre' => null],
            ['empresa_id' => 1, 'codigo' => '2.01.01', 'nombre' => 'Cuentas por pagar', 'tipo' => 0, 'padre' => null],
            ['empresa_id' => 1, 'codigo' => '3.01.01', 'nombre' => 'Capital social', 'tipo' => 0, 'padre' => null],
            ['empresa_id' => 1, 'codigo' => '4.01.01', 'nombre' => 'Ventas', 'tipo' => 0, 'padre' => null],
            ['empresa_id' => 1, 'codigo' => '5.01.01', 'nombre' => 'Costos de ventas', 'tipo' => 1, 'padre' => null],

            // Empresa 2 - CENTA
            ['empresa_id' => 2, 'codigo' => '1.01.01', 'nombre' => 'Caja', 'tipo' => 1, 'padre' => null],
            ['empresa_id' => 2, 'codigo' => '1.01.02', 'nombre' => 'Bancos', 'tipo' => 1, 'padre' => null],
            ['empresa_id' => 2, 'codigo' => '1.02.01', 'nombre' => 'Cuentas por cobrar', 'tipo' => 1, 'padre' => null],
            ['empresa_id' => 2, 'codigo' => '1.03.01', 'nombre' => 'Inventario', 'tipo' => 1, 'padre' => null],
            ['empresa_id' => 2, 'codigo' => '2.01.01', 'nombre' => 'Cuentas por pagar', 'tipo' => 0, 'padre' => null],
            ['empresa_id' => 2, 'codigo' => '3.01.01', 'nombre' => 'Capital social', 'tipo' => 0, 'padre' => null],
            ['empresa_id' => 2, 'codigo' => '4.01.01', 'nombre' => 'Ventas', 'tipo' => 0, 'padre' => null],
            ['empresa_id' => 2, 'codigo' => '5.01.01', 'nombre' => 'Costos de ventas', 'tipo' => 1, 'padre' => null],

            // Empresa 3 - Agrinter
            ['empresa_id' => 3, 'codigo' => '1.01.01', 'nombre' => 'Caja', 'tipo' => 1, 'padre' => null],
            ['empresa_id' => 3, 'codigo' => '1.01.02', 'nombre' => 'Bancos', 'tipo' => 1, 'padre' => null],
            ['empresa_id' => 3, 'codigo' => '1.02.01', 'nombre' => 'Cuentas por cobrar', 'tipo' => 1, 'padre' => null],
            ['empresa_id' => 3, 'codigo' => '1.03.01', 'nombre' => 'Inventario', 'tipo' => 1, 'padre' => null],
            ['empresa_id' => 3, 'codigo' => '2.01.01', 'nombre' => 'Cuentas por pagar', 'tipo' => 0, 'padre' => null],
            ['empresa_id' => 3, 'codigo' => '3.01.01', 'nombre' => 'Capital social', 'tipo' => 0, 'padre' => null],
            ['empresa_id' => 3, 'codigo' => '4.01.01', 'nombre' => 'Ventas', 'tipo' => 0, 'padre' => null],
            ['empresa_id' => 3, 'codigo' => '5.01.01', 'nombre' => 'Costos de ventas', 'tipo' => 1, 'padre' => null],

            // Empresa 4 - Villavar
            ['empresa_id' => 4, 'codigo' => '1.01.01', 'nombre' => 'Caja', 'tipo' => 1, 'padre' => null],
            ['empresa_id' => 4, 'codigo' => '1.01.02', 'nombre' => 'Bancos', 'tipo' => 1, 'padre' => null],
            ['empresa_id' => 4, 'codigo' => '1.02.01', 'nombre' => 'Cuentas por cobrar', 'tipo' => 1, 'padre' => null],
            ['empresa_id' => 4, 'codigo' => '2.01.01', 'nombre' => 'Cuentas por pagar', 'tipo' => 0, 'padre' => null],
            ['empresa_id' => 4, 'codigo' => '3.01.01', 'nombre' => 'Capital social', 'tipo' => 0, 'padre' => null],
            ['empresa_id' => 4, 'codigo' => '4.01.01', 'nombre' => 'Ventas', 'tipo' => 0, 'padre' => null],
            ['empresa_id' => 4, 'codigo' => '5.01.01', 'nombre' => 'Costos de ventas', 'tipo' => 1, 'padre' => null],

            // Empresa 5 - El surco
            ['empresa_id' => 5, 'codigo' => '1.01.01', 'nombre' => 'Caja', 'tipo' => 1, 'padre' => null],
            ['empresa_id' => 5, 'codigo' => '1.01.02', 'nombre' => 'Bancos', 'tipo' => 1, 'padre' => null],
            ['empresa_id' => 5, 'codigo' => '1.02.01', 'nombre' => 'Cuentas por cobrar', 'tipo' => 1, 'padre' => null],
            ['empresa_id' => 5, 'codigo' => '1.03.01', 'nombre' => 'Inventario', 'tipo' => 1, 'padre' => null],
            ['empresa_id' => 5, 'codigo' => '2.01.01', 'nombre' => 'Cuentas por pagar', 'tipo' => 0, 'padre' => null],
            ['empresa_id' => 5, 'codigo' => '3.01.01', 'nombre' => 'Capital social', 'tipo' => 0, 'padre' => null],
            ['empresa_id' => 5, 'codigo' => '4.01.01', 'nombre' => 'Ventas', 'tipo' => 0, 'padre' => null],
            ['empresa_id' => 5, 'codigo' => '5.01.01', 'nombre' => 'Costos de ventas', 'tipo' => 1, 'padre' => null],
        ];

        foreach ($cuentas as $cuenta) {
            DB::table('cuentas')->insert($cuenta);
        }
    }
}