<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DepartamentosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('departamentos')->insert([
            [
                'nombre' => 'Recursos Humanos',
                'codigo' => 'RH01',
                'activo' => true,
                'idUsuarioCreacion' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nombre' => 'Tecnología',
                'codigo' => 'TEC02',
                'activo' => true,
                'idUsuarioCreacion' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nombre' => 'Ventas',
                'codigo' => 'VEN03',
                'activo' => true,
                'idUsuarioCreacion' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nombre' => 'Marketing',
                'codigo' => 'MAR04',
                'activo' => true,
                'idUsuarioCreacion' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
