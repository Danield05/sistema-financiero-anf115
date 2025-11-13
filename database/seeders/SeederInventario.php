<?php

namespace Database\Seeders;

use App\Models\Inventario;
use Illuminate\Database\Seeder;

class SeederInventario extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $inventarios = [
            [
                'producto' => 'Laptop Dell Inspiron 15',
                'cantidad' => 5,
                'costo_unitario' => 800.00,
                'metodo' => 'PEPS',
                'fecha' => '2025-10-01',
                'empresa_id' => 1
            ],
            [
                'producto' => 'Monitor Samsung 24"',
                'cantidad' => 10,
                'costo_unitario' => 150.00,
                'metodo' => 'PEPS',
                'fecha' => '2025-10-05',
                'empresa_id' => 1
            ],
            [
                'producto' => 'Teclado Mecánico Logitech',
                'cantidad' => 15,
                'costo_unitario' => 75.00,
                'metodo' => 'UEPS',
                'fecha' => '2025-10-08',
                'empresa_id' => 1
            ],
            [
                'producto' => 'Mouse Óptico Microsoft',
                'cantidad' => 20,
                'costo_unitario' => 25.00,
                'metodo' => 'costo_promedio',
                'fecha' => '2025-10-10',
                'empresa_id' => 1
            ],
            [
                'producto' => 'Impresora HP LaserJet',
                'cantidad' => 3,
                'costo_unitario' => 200.00,
                'metodo' => 'PEPS',
                'fecha' => '2025-10-12',
                'empresa_id' => 1
            ],
            [
                'producto' => 'Router Cisco',
                'cantidad' => 8,
                'costo_unitario' => 120.00,
                'metodo' => 'UEPS',
                'fecha' => '2025-10-15',
                'empresa_id' => 1
            ],
            [
                'producto' => 'Servidor Dell PowerEdge',
                'cantidad' => 2,
                'costo_unitario' => 2500.00,
                'metodo' => 'PEPS',
                'fecha' => '2025-09-20',
                'empresa_id' => 2
            ],
            [
                'producto' => 'Switch de Red TP-Link',
                'cantidad' => 12,
                'costo_unitario' => 45.00,
                'metodo' => 'costo_promedio',
                'fecha' => '2025-09-25',
                'empresa_id' => 2
            ]
        ];

        foreach ($inventarios as $inventario) {
            Inventario::create($inventario);
        }
    }
}
