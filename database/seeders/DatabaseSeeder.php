<?php

namespace Database\Seeders;

use App\Models\cuenta_sistema;
use App\Models\sector;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call([SeederSector::class]);
        $this->call([SeederEmpresa::class]);
        $this->call([SeederUser::class]);
        $this->call([SeederTablaPermisos::class]);
        $this->call([CuentaSistemaSeeder::class]);
    }
}
