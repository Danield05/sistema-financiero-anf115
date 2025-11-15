<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SeederVinculaciones extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Crear vinculaciones dinámicamente basadas en las cuentas existentes
        $vinculaciones = [];

        for ($empresaId = 1; $empresaId <= 5; $empresaId++) {
            // Caja -> Activo circulante
            $caja = DB::table('cuentas')->where('empresa_id', $empresaId)->where('codigo', '1.1.1.01')->first();
            if ($caja) {
                $vinculaciones[] = ['cuenta_id' => $caja->id, 'cuenta_sistema_id' => 1, 'empresa_id' => $empresaId];
            }

            // Bancos -> Activo circulante
            $bancos = DB::table('cuentas')->where('empresa_id', $empresaId)->where('codigo', '1.1.1.02')->first();
            if ($bancos) {
                $vinculaciones[] = ['cuenta_id' => $bancos->id, 'cuenta_sistema_id' => 1, 'empresa_id' => $empresaId];
            }

            // Cuentas por cobrar -> Cuentas por cobrar corto plazo
            $cuentasCobrar = DB::table('cuentas')->where('empresa_id', $empresaId)->where('codigo', '1.1.2.01')->first();
            if ($cuentasCobrar) {
                $vinculaciones[] = ['cuenta_id' => $cuentasCobrar->id, 'cuenta_sistema_id' => 7, 'empresa_id' => $empresaId];
            }

            // Inventario -> Activo circulante
            $inventario = DB::table('cuentas')->where('empresa_id', $empresaId)->where('codigo', '1.1.3.01')->first();
            if ($inventario) {
                $vinculaciones[] = ['cuenta_id' => $inventario->id, 'cuenta_sistema_id' => 1, 'empresa_id' => $empresaId];
            }

            // Cuentas por pagar -> Cuentas por pagar corto plazo
            $cuentasPagar = DB::table('cuentas')->where('empresa_id', $empresaId)->where('codigo', '2.1.1.01')->first();
            if ($cuentasPagar) {
                $vinculaciones[] = ['cuenta_id' => $cuentasPagar->id, 'cuenta_sistema_id' => 9, 'empresa_id' => $empresaId];
            }

            // Capital social -> Capital social
            $capitalSocial = DB::table('cuentas')->where('empresa_id', $empresaId)->where('codigo', '3.1.1.01')->first();
            if ($capitalSocial) {
                $vinculaciones[] = ['cuenta_id' => $capitalSocial->id, 'cuenta_sistema_id' => 5, 'empresa_id' => $empresaId];
            }

            // Ventas -> Ventas
            $ventas = DB::table('cuentas')->where('empresa_id', $empresaId)->where('codigo', '4.1.1.01')->first();
            if ($ventas) {
                $vinculaciones[] = ['cuenta_id' => $ventas->id, 'cuenta_sistema_id' => 25, 'empresa_id' => $empresaId];
            }

            // Costos de ventas -> Costo de ventas
            $costosVentas = DB::table('cuentas')->where('empresa_id', $empresaId)->where('codigo', '5.1.1.01')->first();
            if ($costosVentas) {
                $vinculaciones[] = ['cuenta_id' => $costosVentas->id, 'cuenta_sistema_id' => 6, 'empresa_id' => $empresaId];
            }
        }

        foreach ($vinculaciones as $vinculacion) {
            DB::table('vinculacions')->insert($vinculacion);
        }
    }
}