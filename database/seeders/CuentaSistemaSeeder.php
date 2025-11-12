<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CuentaSistemaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()// 'descripcion' => 'Los activos de la empresa'
    {
        $cuenta_sistema = [
            [
                'nombre' => 'Activo circulante (corriente)',
                'uso' => '0',
            ],
            [
                'nombre' => 'Activo fijo (no corriente)',
                'uso' => '0',
            ],
            [
                'nombre' => 'Activo',
                'uso' => '0',
            ],
            [
                'nombre' => 'Capital contable',
                'uso' => '0',
            ],
            [
                'nombre' => 'Capital social',
                'uso' => '0',
            ],
            [
                'nombre' => 'Costo de ventas',
                'uso' => '0',
            ],
            [
                'nombre' => 'Cuentas por cobrar a corto plazo',
                'uso' => '0',
            ],
            [
                'nombre' => 'Cuentas por cobrar a largo plazo',
                'uso' => '0',
            ],
            [
                'nombre' => 'Cuentas por pagar a corto plazo',
                'uso' => '0',
            ],
            [
                'nombre' => 'Cuentas por pagar a largo plazo',
                'uso' => '0',
            ],
            [
                'nombre' => 'Devolución sobre ventas',
                'uso' => '0',
            ],
            [
                'nombre' => 'Documentos por pagar a corto plazo',
                'uso' => '0',
            ],
            [
                'nombre' => 'Efectivo y equivalentes',
                'uso' => '0',
            ],
            [
                'nombre' => 'Ganancias retenidas',
                'uso' => '0',
            ],
            [
                'nombre' => 'Gastos de operación',
                'uso' => '0',
            ],
            [
                'nombre' => 'Gastos financieros',
                'uso' => '0',
            ],
            [
                'nombre' => 'Impuestos',
                'uso' => '0',
            ],
            [
                'nombre' => 'Inventario',
                'uso' => '0',
            ],
            [
                'nombre' => 'Pasivo fijo (no corriente)',
                'uso' => '0',
            ],
            [
                'nombre' => 'Pasivo',
                'uso' => '0',
            ],
            [
                'nombre' => 'Pasivo circulantes (corriente)',
                'uso' => '0',
            ],
            [
                'nombre' => 'Patrimonio',
                'uso' => '0',
            ],
            [
                'nombre' => 'Propiedad planta y equipo',
                'uso' => '0',
            ],
            [
                'nombre' => 'Rebaja sobre ventas',
                'uso' => '0',
            ],
            [
                'nombre' => 'Ventas',
                'uso' => '0',
            ],
            [
                'nombre' => 'Utilidad neta',
                'uso' => '0',
            ],
        ];

        DB::table('cuenta_sistemas')->insert($cuenta_sistema);

    }
}
