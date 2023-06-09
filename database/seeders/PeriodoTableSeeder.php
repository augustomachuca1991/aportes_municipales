<?php

namespace Database\Seeders;

use App\Models\Periodo;
use Illuminate\Database\Seeder;

class PeriodoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $periodos = [
            ['codigo' => 202001, 'mes' => 01, 'periodo_milisegundos' => 1, 'anio' => 2020, 'periodo' => 'Enero de 2020', 'created_at' => now()],
            ['codigo' => 202002, 'mes' => 02, 'periodo_milisegundos' => 2, 'anio' => 2020, 'periodo' => 'Febrero de 2020', 'created_at' => now()],
            ['codigo' => 202003, 'mes' => 03, 'periodo_milisegundos' => 3, 'anio' => 2020, 'periodo' => 'Marzo de 2020', 'created_at' => now()],
            ['codigo' => 202004, 'mes' => 04, 'periodo_milisegundos' => 4, 'anio' => 2020, 'periodo' => 'Abril de 2020', 'created_at' => now()],
            ['codigo' => 202005, 'mes' => 05, 'periodo_milisegundos' => 5, 'anio' => 2020, 'periodo' => 'Mayo de 2020', 'created_at' => now()],
            ['codigo' => 202006, 'mes' => 06, 'periodo_milisegundos' => 6, 'anio' => 2020, 'periodo' => 'Junio de 2020', 'created_at' => now()],
            ['codigo' => 202007, 'mes' => 07, 'periodo_milisegundos' => 7, 'anio' => 2020, 'periodo' => 'Julio de 2020', 'created_at' => now()],
            ['codigo' => 202102, 'mes' => 02, 'periodo_milisegundos' => 8, 'anio' => 2021, 'periodo' => 'Febrero de 2021', 'created_at' => now()],
            // ['codigo' => 202008 , 'mes' => 08, 'anio' => 2020 , 'periodo' => 'Agosto de 2020','created_at' => now()],
            // ['codigo' => 202009 , 'mes' => 09, 'anio' => 2020 , 'periodo' => 'Septiembre de 2020','created_at' => now()],
            // ['codigo' => 202010 , 'mes' => 10, 'anio' => 2020 , 'periodo' => 'Octubre de 2020','created_at' => now()],
            // ['codigo' => 202011 , 'mes' => 11, 'anio' => 2020 , 'periodo' => 'Noviembre de 2020','created_at' => now()],
            // ['codigo' => 202012 , 'mes' => 12, 'anio' => 2020 , 'periodo' => 'Diciembre de 2020','created_at' => now()],
        ];
        Periodo::insert($periodos);
    }
}
