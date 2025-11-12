<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class SeederUser extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Crear usuario Administrador
        $adminUser = User::create([
            'name' => 'Administrador General',
            'email' => 'admin@sifin.com',
            'password' => bcrypt('admin123'),
            'empresa_id' => 1
        ]);

        // Crear usuario Contador
        $contadorUser = User::create([
            'name' => 'María González',
            'email' => 'contador@sifin.com',
            'password' => bcrypt('contador123'),
            'empresa_id' => 1
        ]);

        // Crear usuarios de prueba adicionales
        $testUsers = [
            [
                'name' => 'Juan Pérez',
                'email' => 'juan.perez@sifin.com',
                'password' => bcrypt('user123'),
                'empresa_id' => 1
            ],
            [
                'name' => 'Ana López',
                'email' => 'ana.lopez@sifin.com',
                'password' => bcrypt('user123'),
                'empresa_id' => 2
            ],
        ];

        foreach ($testUsers as $userData) {
            User::create($userData);
        }

        // Crear roles
        $adminRole = Role::create(['name' => 'Administrador']);
        $contadorRole = Role::create(['name' => 'Contador']);

        // Obtener todos los permisos disponibles
        $allPermissions = Permission::pluck('id')->all();

        // Definir permisos para cada rol
        $adminPermissions = $allPermissions; // Administrador tiene todos los permisos

        $contadorPermissions = Permission::whereIn('name', [
            'ver-empresa',
            'crear-empresa',
            'editar-empresa',
            'ver-usuario',
            'crear-usuario',
            'editar-usuario',
            // Contadores pueden ver pero no modificar roles
            'ver-rol'
        ])->pluck('id')->all();

        // Asignar permisos a roles
        $adminRole->syncPermissions($adminPermissions);
        $contadorRole->syncPermissions($contadorPermissions);

        // Asignar roles a usuarios
        $adminUser->assignRole([$adminRole->id]);
        $contadorUser->assignRole([$contadorRole->id]);
    }
}
