<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class UsuariosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('usuarios')->insert([
            [
                'usuario' => 'vvicente',
                'primerNombre' => 'Victor',
                'segundoNombre' => 'Manuel',
                'primerApellido' => 'Vicente',
                'segundoApellido' => 'Lopez',
                'activo' => true,
                'idDepartamento' => 1,
                'idCargo' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'usuario' => 'mjackson',
                'primerNombre' => 'Michael',
                'segundoNombre' => 'Felipe',
                'primerApellido' => 'Jackson',
                'segundoApellido' => 'Jackson',
                'activo' => true,
                'idDepartamento' => 2,
                'idCargo' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        ]);
    }
}
