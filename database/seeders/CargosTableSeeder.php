<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CargosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('cargos')->insert([
            [
                'nombre' => 'Gerente',
                'codigo' => 'GER01',
                'activo' => true,
                'idUsuarioCreacion' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nombre' => 'Desarrollador',
                'codigo' => 'DES02',
                'activo' => true,
                'idUsuarioCreacion' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nombre' => 'Vendedor',
                'codigo' => 'VEN03',
                'activo' => true,
                'idUsuarioCreacion' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nombre' => 'Marketing Manager',
                'codigo' => 'MAR04',
                'activo' => true,
                'idUsuarioCreacion' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
