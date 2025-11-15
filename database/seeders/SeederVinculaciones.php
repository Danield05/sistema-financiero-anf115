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
        $vinculaciones = [
            // Empresa 1 - Temporal
            ['cuenta_id' => 1, 'cuenta_sistema_id' => 1, 'empresa_id' => 1], // Caja -> Activo circulante
            ['cuenta_id' => 2, 'cuenta_sistema_id' => 1, 'empresa_id' => 1], // Bancos -> Activo circulante
            ['cuenta_id' => 3, 'cuenta_sistema_id' => 7, 'empresa_id' => 1], // Cuentas por cobrar -> Cuentas por cobrar corto plazo
            ['cuenta_id' => 4, 'cuenta_sistema_id' => 9, 'empresa_id' => 1], // Cuentas por pagar -> Cuentas por pagar corto plazo
            ['cuenta_id' => 5, 'cuenta_sistema_id' => 5, 'empresa_id' => 1], // Capital social -> Capital social
            ['cuenta_id' => 6, 'cuenta_sistema_id' => 4, 'empresa_id' => 1], // Ventas -> Ventas (ajustado)
            ['cuenta_id' => 7, 'cuenta_sistema_id' => 6, 'empresa_id' => 1], // Costos de ventas -> Costo de ventas

            // Empresa 2 - CENTA
            ['cuenta_id' => 8, 'cuenta_sistema_id' => 1, 'empresa_id' => 2], // Caja -> Activo circulante
            ['cuenta_id' => 9, 'cuenta_sistema_id' => 1, 'empresa_id' => 2], // Bancos -> Activo circulante
            ['cuenta_id' => 10, 'cuenta_sistema_id' => 7, 'empresa_id' => 2], // Cuentas por cobrar -> Cuentas por cobrar corto plazo
            ['cuenta_id' => 11, 'cuenta_sistema_id' => 1, 'empresa_id' => 2], // Inventario -> Activo circulante
            ['cuenta_id' => 12, 'cuenta_sistema_id' => 9, 'empresa_id' => 2], // Cuentas por pagar -> Cuentas por pagar corto plazo
            ['cuenta_id' => 13, 'cuenta_sistema_id' => 5, 'empresa_id' => 2], // Capital social -> Capital social
            ['cuenta_id' => 14, 'cuenta_sistema_id' => 4, 'empresa_id' => 2], // Ventas -> Ventas (ajustado)
            ['cuenta_id' => 15, 'cuenta_sistema_id' => 6, 'empresa_id' => 2], // Costos de ventas -> Costo de ventas

            // Empresa 3 - Agrinter
            ['cuenta_id' => 16, 'cuenta_sistema_id' => 1, 'empresa_id' => 3], // Caja -> Activo circulante
            ['cuenta_id' => 17, 'cuenta_sistema_id' => 1, 'empresa_id' => 3], // Bancos -> Activo circulante
            ['cuenta_id' => 18, 'cuenta_sistema_id' => 7, 'empresa_id' => 3], // Cuentas por cobrar -> Cuentas por cobrar corto plazo
            ['cuenta_id' => 19, 'cuenta_sistema_id' => 1, 'empresa_id' => 3], // Inventario -> Activo circulante
            ['cuenta_id' => 20, 'cuenta_sistema_id' => 9, 'empresa_id' => 3], // Cuentas por pagar -> Cuentas por pagar corto plazo
            ['cuenta_id' => 21, 'cuenta_sistema_id' => 5, 'empresa_id' => 3], // Capital social -> Capital social
            ['cuenta_id' => 22, 'cuenta_sistema_id' => 4, 'empresa_id' => 3], // Ventas -> Ventas (ajustado)
            ['cuenta_id' => 23, 'cuenta_sistema_id' => 6, 'empresa_id' => 3], // Costos de ventas -> Costo de ventas

            // Empresa 4 - Villavar
            ['cuenta_id' => 24, 'cuenta_sistema_id' => 1, 'empresa_id' => 4], // Caja -> Activo circulante
            ['cuenta_id' => 25, 'cuenta_sistema_id' => 1, 'empresa_id' => 4], // Bancos -> Activo circulante
            ['cuenta_id' => 26, 'cuenta_sistema_id' => 7, 'empresa_id' => 4], // Cuentas por cobrar -> Cuentas por cobrar corto plazo
            ['cuenta_id' => 27, 'cuenta_sistema_id' => 9, 'empresa_id' => 4], // Cuentas por pagar -> Cuentas por pagar corto plazo
            ['cuenta_id' => 28, 'cuenta_sistema_id' => 5, 'empresa_id' => 4], // Capital social -> Capital social
            ['cuenta_id' => 29, 'cuenta_sistema_id' => 4, 'empresa_id' => 4], // Ventas -> Ventas (ajustado)
            ['cuenta_id' => 30, 'cuenta_sistema_id' => 6, 'empresa_id' => 4], // Costos de ventas -> Costo de ventas

            // Empresa 5 - El surco
            ['cuenta_id' => 31, 'cuenta_sistema_id' => 1, 'empresa_id' => 5], // Caja -> Activo circulante
            ['cuenta_id' => 32, 'cuenta_sistema_id' => 1, 'empresa_id' => 5], // Bancos -> Activo circulante
            ['cuenta_id' => 33, 'cuenta_sistema_id' => 7, 'empresa_id' => 5], // Cuentas por cobrar -> Cuentas por cobrar corto plazo
            ['cuenta_id' => 34, 'cuenta_sistema_id' => 1, 'empresa_id' => 5], // Inventario -> Activo circulante
            ['cuenta_id' => 35, 'cuenta_sistema_id' => 9, 'empresa_id' => 5], // Cuentas por pagar -> Cuentas por pagar corto plazo
            ['cuenta_id' => 36, 'cuenta_sistema_id' => 5, 'empresa_id' => 5], // Capital social -> Capital social
            ['cuenta_id' => 37, 'cuenta_sistema_id' => 4, 'empresa_id' => 5], // Ventas -> Ventas (ajustado)
            ['cuenta_id' => 38, 'cuenta_sistema_id' => 6, 'empresa_id' => 5], // Costos de ventas -> Costo de ventas
        ];

        foreach ($vinculaciones as $vinculacion) {
            DB::table('vinculacions')->insert($vinculacion);
        }
    }
}