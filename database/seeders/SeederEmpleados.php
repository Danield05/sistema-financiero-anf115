<?php

namespace Database\Seeders;

use App\Models\Empleado;
use Illuminate\Database\Seeder;

class SeederEmpleados extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $empleados = [
            [
                'nombre' => 'Juan',
                'apellido' => 'Pérez',
                'dui' => '00123456-7',
                'nit' => '1234-567890-123-4',
                'fecha_nacimiento' => '1985-03-15',
                'fecha_contratacion' => '2020-01-15',
                'salario_base' => 800.00,
                'empresa_id' => 1
            ],
            [
                'nombre' => 'María',
                'apellido' => 'González',
                'dui' => '00876543-2',
                'nit' => '5678-901234-567-8',
                'fecha_nacimiento' => '1990-07-22',
                'fecha_contratacion' => '2021-03-10',
                'salario_base' => 750.00,
                'empresa_id' => 1
            ],
            [
                'nombre' => 'Carlos',
                'apellido' => 'Rodríguez',
                'dui' => '00567890-1',
                'nit' => '9012-345678-901-2',
                'fecha_nacimiento' => '1988-11-08',
                'fecha_contratacion' => '2019-08-20',
                'salario_base' => 900.00,
                'empresa_id' => 1
            ],
            [
                'nombre' => 'Ana',
                'apellido' => 'Martínez',
                'dui' => '00345678-9',
                'nit' => '3456-789012-345-6',
                'fecha_nacimiento' => '1992-05-30',
                'fecha_contratacion' => '2022-01-05',
                'salario_base' => 700.00,
                'empresa_id' => 1
            ],
            [
                'nombre' => 'Luis',
                'apellido' => 'Hernández',
                'dui' => '00789012-3',
                'nit' => '7890-123456-789-0',
                'fecha_nacimiento' => '1987-09-12',
                'fecha_contratacion' => '2020-06-15',
                'salario_base' => 850.00,
                'empresa_id' => 1
            ],
            [
                'nombre' => 'Sofía',
                'apellido' => 'López',
                'dui' => '00234567-8',
                'nit' => '2345-678901-234-5',
                'fecha_nacimiento' => '1995-12-03',
                'fecha_contratacion' => '2023-02-01',
                'salario_base' => 650.00,
                'empresa_id' => 2
            ]
        ];

        foreach ($empleados as $empleado) {
            Empleado::create($empleado);
        }
    }
}
