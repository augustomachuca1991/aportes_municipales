<?php

namespace Database\Seeders;

use App\Models\Funcion;
use Illuminate\Database\Seeder;

class FuncionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $funciones = [
            ['codigo' => 1, 'funcion' => 'funcion 1'],
            ['codigo' => 2, 'funcion' => 'funcion 2'],
            ['codigo' => 3, 'funcion' => 'funcion 3'],
            ['codigo' => 4, 'funcion' => 'funcion 4'],
            ['codigo' => 5, 'funcion' => 'funcion 5'],
            ['codigo' => 6, 'funcion' => 'funcion 6'],
            ['codigo' => 7, 'funcion' => 'funcion 7'],
            ['codigo' => 8, 'funcion' => 'funcion 8'],
            ['codigo' => 9, 'funcion' => 'funcion 9'],
            ['codigo' => 10, 'funcion' => 'funcion 10'],

        ];
        Funcion::Insert($funciones);
    }
}
