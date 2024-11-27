<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class MensualidadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('mensualidad')->insert(
            [
                [
                    'nombre' => 'Enero',
                    'idGestion' => 1,
                    'eliminado' => 0,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ],
                [
                    'nombre' => 'Febrero',
                    'idGestion' => 1,
                    'eliminado' => 0,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ],
                [
                    'nombre' => 'Marzo',
                    'idGestion' => 1,
                    'eliminado' => 0,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ],
                [
                    'nombre' => 'Abril',
                    'idGestion' => 1,
                    'eliminado' => 0,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ],
                [
                    'nombre' => 'Mayo',
                    'idGestion' => 1,
                    'eliminado' => 0,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ],
                [
                    'nombre' => 'Junio',
                    'idGestion' => 1,
                    'eliminado' => 0,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ],
                [
                    'nombre' => 'Julio',
                    'idGestion' => 1,
                    'eliminado' => 0,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ],
                [
                    'nombre' => 'Agosto',
                    'idGestion' => 1,
                    'eliminado' => 0,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ],
                [
                    'nombre' => 'Septiembre',
                    'idGestion' => 1,
                    'eliminado' => 0,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ],
                [
                    'nombre' => 'Octubre',
                    'idGestion' => 1,
                    'eliminado' => 0,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ],
                [
                    'nombre' => 'Noviembre',
                    'idGestion' => 1,
                    'eliminado' => 0,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ],
                [
                    'nombre' => 'Diciembre',
                    'idGestion' => 1,
                    'eliminado' => 0,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ]
            ]
        );
    }
}
