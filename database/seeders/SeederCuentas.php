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
        // Función helper para crear cuentas por empresa
        $crearCatalogoEmpresa = function($empresaId) {
            return [
                // ACTIVO
                ['empresa_id' => $empresaId, 'codigo' => '1', 'nombre' => 'ACTIVO', 'tipo' => 1, 'padre' => null],
                ['empresa_id' => $empresaId, 'codigo' => '1.1', 'nombre' => 'ACTIVO CORRIENTE', 'tipo' => 1, 'padre' => '1'],
                ['empresa_id' => $empresaId, 'codigo' => '1.1.1', 'nombre' => 'DISPONIBLE', 'tipo' => 1, 'padre' => '1.1'],
                ['empresa_id' => $empresaId, 'codigo' => '1.1.1.01', 'nombre' => 'Caja', 'tipo' => 1, 'padre' => '1.1.1'],
                ['empresa_id' => $empresaId, 'codigo' => '1.1.1.02', 'nombre' => 'Bancos', 'tipo' => 1, 'padre' => '1.1.1'],
                ['empresa_id' => $empresaId, 'codigo' => '1.1.2', 'nombre' => 'CUENTAS POR COBRAR', 'tipo' => 1, 'padre' => '1.1'],
                ['empresa_id' => $empresaId, 'codigo' => '1.1.2.01', 'nombre' => 'Cuentas por cobrar', 'tipo' => 1, 'padre' => '1.1.2'],
                ['empresa_id' => $empresaId, 'codigo' => '1.1.3', 'nombre' => 'INVENTARIOS', 'tipo' => 1, 'padre' => '1.1'],
                ['empresa_id' => $empresaId, 'codigo' => '1.1.3.01', 'nombre' => 'Inventario', 'tipo' => 1, 'padre' => '1.1.3'],

                // PASIVO
                ['empresa_id' => $empresaId, 'codigo' => '2', 'nombre' => 'PASIVO', 'tipo' => 0, 'padre' => null],
                ['empresa_id' => $empresaId, 'codigo' => '2.1', 'nombre' => 'PASIVO CORRIENTE', 'tipo' => 0, 'padre' => '2'],
                ['empresa_id' => $empresaId, 'codigo' => '2.1.1', 'nombre' => 'CUENTAS POR PAGAR', 'tipo' => 0, 'padre' => '2.1'],
                ['empresa_id' => $empresaId, 'codigo' => '2.1.1.01', 'nombre' => 'Cuentas por pagar', 'tipo' => 0, 'padre' => '2.1.1'],

                // PATRIMONIO
                ['empresa_id' => $empresaId, 'codigo' => '3', 'nombre' => 'PATRIMONIO', 'tipo' => 0, 'padre' => null],
                ['empresa_id' => $empresaId, 'codigo' => '3.1', 'nombre' => 'CAPITAL CONTABLE', 'tipo' => 0, 'padre' => '3'],
                ['empresa_id' => $empresaId, 'codigo' => '3.1.1', 'nombre' => 'CAPITAL SOCIAL', 'tipo' => 0, 'padre' => '3.1'],
                ['empresa_id' => $empresaId, 'codigo' => '3.1.1.01', 'nombre' => 'Capital social', 'tipo' => 0, 'padre' => '3.1.1'],

                // INGRESOS
                ['empresa_id' => $empresaId, 'codigo' => '4', 'nombre' => 'INGRESOS', 'tipo' => 0, 'padre' => null],
                ['empresa_id' => $empresaId, 'codigo' => '4.1', 'nombre' => 'INGRESOS OPERACIONALES', 'tipo' => 0, 'padre' => '4'],
                ['empresa_id' => $empresaId, 'codigo' => '4.1.1', 'nombre' => 'VENTAS', 'tipo' => 0, 'padre' => '4.1'],
                ['empresa_id' => $empresaId, 'codigo' => '4.1.1.01', 'nombre' => 'Ventas', 'tipo' => 0, 'padre' => '4.1.1'],

                // GASTOS
                ['empresa_id' => $empresaId, 'codigo' => '5', 'nombre' => 'GASTOS', 'tipo' => 1, 'padre' => null],
                ['empresa_id' => $empresaId, 'codigo' => '5.1', 'nombre' => 'GASTOS OPERACIONALES', 'tipo' => 1, 'padre' => '5'],
                ['empresa_id' => $empresaId, 'codigo' => '5.1.1', 'nombre' => 'COSTO DE VENTAS', 'tipo' => 1, 'padre' => '5.1'],
                ['empresa_id' => $empresaId, 'codigo' => '5.1.1.01', 'nombre' => 'Costos de ventas', 'tipo' => 1, 'padre' => '5.1.1'],
            ];
        };

        $cuentas = [];
        for ($empresaId = 1; $empresaId <= 5; $empresaId++) {
            $cuentas = array_merge($cuentas, $crearCatalogoEmpresa($empresaId));
        }

        foreach ($cuentas as $cuenta) {
            DB::table('cuentas')->insert($cuenta);
        }
    }
}