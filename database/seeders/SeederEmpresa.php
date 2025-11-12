<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SeederEmpresa extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $empresas = [
            [   
                'sector_id' => 1,
                'nombre' => 'Temporal',
                'nit' => '00000000',
                'nrc' => '00000000',
                'catalogo_listo' => false,
                'vinculacion_listo' =>false
            ],
            [
                'sector_id' => 3,
                'nombre' => 'CENTA',
                'nit' => '12345678',
                'nrc' => '12345678',
                'catalogo_listo' => false,
                'vinculacion_listo' =>false
            ],
            [
                'sector_id' => 3,
                'nombre' => 'Agrinter',
                'nit' => '12345678',
                'nrc' => '12345678',
                'catalogo_listo' => false,
                'vinculacion_listo' =>false
            ],
            [
                'sector_id' => 3,
                'nombre' => 'Villavar',
                'nit' => '12345678',
                'nrc' => '12345678',
                'catalogo_listo' => false,
                'vinculacion_listo' =>false
            ],
            [
                'sector_id' => 3,
                'nombre' => 'El surco',
                'nit' => '12345678',
                'nrc' => '12345678',
                'catalogo_listo' => false,
                'vinculacion_listo' =>false
            ]
        ];

        DB::table('empresas')->insert($empresas);

    }
}
