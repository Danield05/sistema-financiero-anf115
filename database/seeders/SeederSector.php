<?php

namespace Database\Seeders;

use App\Models\sector;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SeederSector extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
/*         $sectors = [
            'Temporal',
            'Agricola',
            'Industrial',
            'Mineria'
        ]; */

        $sectors = [
            [
                'nombre' => 'Temporal',
                'razon_circulante' => 0,
                'prueba_acida' => 0,
                'rotacion_inventario' => 0,
                'rotacion_cuentas_por_cobrar' =>  0,
                'grado_endeudamiento' => 0,
                'razon_endeudamiento_patrimonial' => 0,
                'rentabilidad_neta_del_patrimonio'=> 0,
                'rentabilidad_del_activo' => 0,
                'rentabilidad_sobre_venta' => 0,
            ],
            [
                'nombre' => 'Maquinaria industrial y comercial y equipo de cómputo',
                'razon_circulante' => 2.01,
                'prueba_acida' => 1.27,
                'rotacion_inventario' => 89.00,
                'rotacion_cuentas_por_cobrar' => 62.17,
                'grado_endeudamiento' => 0.55,
                'razon_endeudamiento_patrimonial' => 0.96,
                'rentabilidad_neta_del_patrimonio'=> 3,
                'rentabilidad_del_activo' => 2,
                'rentabilidad_sobre_venta' => 3
            ],
            [
                'nombre' => 'Agroquimicos',
                'razon_circulante' => 1.86,
                'prueba_acida' => 0.87,
                'rotacion_inventario' => 149.83,
                'rotacion_cuentas_por_cobrar' => 56,
                'grado_endeudamiento' => 0.57,
                'razon_endeudamiento_patrimonial' => 0.81,
                'rentabilidad_neta_del_patrimonio'=> -26,
                'rentabilidad_del_activo' => -7,
                'rentabilidad_sobre_venta' => -15
            ],
            [
                'nombre' => 'Aeronaves y componentes',
                'razon_circulante' => 2.16,
                'prueba_acida' => 0.81,
                'rotacion_inventario' => 103.83,
                'rotacion_cuentas_por_cobrar' => 57.5,
                'grado_endeudamiento' => 0.63,
                'razon_endeudamiento_patrimonial' => 0.74,
                'rentabilidad_neta_del_patrimonio'=> 0.37,
                'rentabilidad_del_activo' => 2,
                'rentabilidad_sobre_venta' => 3
            ],
            [
                'nombre' => 'Textil',
                'razon_circulante' => 2.71,
                'prueba_acida' => 0.91,
                'rotacion_inventario' => 100.67,
                'rotacion_cuentas_por_cobrar' => 45.17,
                'grado_endeudamiento' => 0.45,
                'razon_endeudamiento_patrimonial' => 0.69,
                'rentabilidad_neta_del_patrimonio'=> 7,
                'rentabilidad_del_activo' => 4,
                'rentabilidad_sobre_venta' => 4
            ],
            [
                'nombre' => 'Tiendas de comida',
                'razon_circulante' => 1.27,
                'prueba_acida' => 0.4,
                'rotacion_inventario' => 29.33,
                'rotacion_cuentas_por_cobrar' => 5,
                'grado_endeudamiento' => 0.65,
                'razon_endeudamiento_patrimonial' => 1,
                'rentabilidad_neta_del_patrimonio'=> 10,
                'rentabilidad_del_activo' => 4,
                'rentabilidad_sobre_venta' => 2
            ],
        ];

        foreach($sectors as $sector){
            // sector::create(['nombre'=>$sector])->exclude('created_at','updated_at');
            DB::table('sectors')->insert(['nombre'=>$sector]);
        }
    }
}
