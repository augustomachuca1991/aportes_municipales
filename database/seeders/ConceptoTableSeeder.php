<?php

namespace Database\Seeders;

use App\Models\Concepto;
use App\Models\Liquidacion;
use Illuminate\Database\Seeder;

class ConceptoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $conceptos = [
            ['concepto' => 'basico', 'codigo' => 1, 'unidad' => 'unidad 1', 'subtipocodigo_id'=> 1,'created_at' => now()],
            ['concepto' => 'antiguedad','codigo' => 2, 'unidad' => 'unidad 2', 'subtipocodigo_id'=> 2,'created_at' => now()],
            ['concepto' => 'presentismo','codigo' => 3, 'unidad' => 'unidad 3', 'subtipocodigo_id'=> 3,'created_at' => now()],
            ['concepto' => 'bonificacion por titutlo', 'codigo' => 4, 'unidad' => 'unidad 3', 'subtipocodigo_id'=> 4,'created_at' => now()],
            ['concepto' => 'esposa', 'codigo' => 5, 'unidad' => 'unidad 5', 'subtipocodigo_id'=> 8,'created_at' => now()],
            ['concepto' => 'jubilacion', 'codigo' => 6, 'unidad' => 'unidad 6', 'subtipocodigo_id'=> 9,'created_at' => now()],
            ['concepto' => 'obra social', 'codigo' => 7, 'unidad' => 'unidad 7', 'subtipocodigo_id'=> 11,'created_at' => now()],
            ['concepto' => 'seguro de vida', 'codigo' => 8, 'unidad' => 'unidad 8', 'subtipocodigo_id'=> 11,'created_at' => now()],
            ['concepto' => 'resolucion nº 552/2009', 'codigo' => 9, 'unidad' => 'unidad 9', 'subtipocodigo_id'=> 5,'created_at' => now()],
        ];
        Concepto::insert($conceptos);
        $conceptos = Concepto::all();
        $liquidaciones = Liquidacion::all();
        foreach ($liquidaciones as $keyL => $liquidacion) {
            foreach ($conceptos as $keyC => $concepto) {
                $concepto->liquidaciones()->attach($liquidacion->id, ['importe' => $keyL + 1, 'codigo' => $keyL + $keyC + 1]);
            }
        }

        foreach ($conceptos as $index => $concepto) {
            $concepto->organismos()->attach(1, ['codigo' => $index]);
        }
    }
}
