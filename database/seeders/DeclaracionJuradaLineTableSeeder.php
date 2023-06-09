<?php

namespace Database\Seeders;


use App\Models\DeclaracionJuradaLine;
use Illuminate\Database\Seeder;

class DeclaracionJuradaLineTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $declaracionesjuradaslines = [
            [
                'declaracionjurada_id' => 1,
                'nombre' => 'augusto machuca',
                'cuil' => '20362698309',
                'fecha_nac' => date("Y-m-d", strtotime('1991-06-03')),
                'created_at' => now(),
                'sexo' => 'M',
                'puesto_laboral' => 1,
                'cargo' => 'docente',
                'fecha_ingreso' => date("Y-m-d", strtotime('2018-04-01')),
                'cod_categoria' => 1,
                'categoria' => 'categoria 1',
                'cod_clase' => 1,
                'clase' => 'cod_clase',
                'cod_estado' => 1,
                'estado' => 'Activo',
                'cod_organismo' => 2,
                'detalle' => 'detalle full time',
                'cod_funcion' => 1,
                'funcion' => 'jefe de departamento'

            ],
            [
                'declaracionjurada_id' => 1,
                'nombre' => 'cintia galain',
                'cuil' => '27362695595',
                'fecha_nac' => date("Y-m-d", strtotime('1993-12-03')),
                'created_at' => now(),
                'sexo' => 'F',
                'puesto_laboral' => 2,
                'cargo' => 'docente',
                'fecha_ingreso' => date("Y-m-d", strtotime('2018-04-01')),
                'cod_categoria' => 1,
                'categoria' => 'categoria 1',
                'cod_clase' => 1,
                'clase' => 'cod_clase',
                'cod_estado' => 1,
                'estado' => 'Activo',
                'cod_organismo' => 2,
                'detalle' => 'detalle full time',
                'cod_funcion' => 1,
                'funcion' => 'jefe de departamento'

            ],
        ];
        DeclaracionJuradaLine::insert($declaracionesjuradaslines);
    }
}
