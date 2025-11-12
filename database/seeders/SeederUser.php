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
        $usuario = User::create(
            [
                'name' => 'admin',
                'email' => 'admin@admin.com',
                'password' => bcrypt('admin'),
                'empresa_id' => 1
            ],
        );

        $usu = [
            [
                'name' => 'Gerson Israel Alvarado Escobar',
                'email' => 'gerson.alvarado@econoscope.com',
                'password' => bcrypt('AE17004'),
                'empresa_id' => 1
            ],
            [
                'name' => 'Álvaro Daniel García Guevara',
                'email' => 'alvaro.garcia@econoscope.com',
                'password' => bcrypt('GG20013'),
                'empresa_id' => 2
            ],
            [
                'name' => 'Carlos Eduardo Rafaelano Santos',
                'email' => 'carlos.rafaelano@econoscope.com',
                'password' => bcrypt('RS20002'),
                'empresa_id' => 3
            ],
            [
                'name' => 'Kevin Anthony Rogel Hernández',
                'email' => 'kevin.rogel@econoscope.com',
                'password' => bcrypt('RH20049'),
                'empresa_id' => 4
            ],
            [
                'name' => 'Carlos Alonso Vásquez Rodríguez',
                'email' => 'carlos.vasquez@econoscope.com',
                'password' => bcrypt('VR16021'),
                'empresa_id' => 5
            ],
        ];

        DB::table('users')->insert($usu);

        // Creo el Rol  administrador 
        $rol = Role::create(['name' => 'Administrador']);

        // Se le dan todos los permisos pertienentes 
        $permisos = Permission::pluck('id', 'id')->all();

        //se sincroniza el permiso al rol
        $rol->syncPermissions($permisos);

        // Se asigna el rol 
        $usuario->assignRole([$rol->id]);
    }
}
