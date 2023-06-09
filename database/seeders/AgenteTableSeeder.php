<?php

namespace Database\Seeders;

use App\Models\Agente;
use Illuminate\Database\Seeder;

class AgenteTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $agente1 = Agente::create([
            'cuil' => 20362698309,
            'nombre' => 'Machuca Augusto',
            'fecha_nac' => date('Y-m-d', strtotime('1991-06-03')),
            'sexo' => 'M',
        ]);
        $agente2 = Agente::create([
            'cuil' => 27362695595,
            'nombre' => 'Cintia Galain',
            'fecha_nac' => date('Y-m-d', strtotime('1993-12-03')),
            'sexo' => 'F',
        ]);

        $agente1->liquidaciones()->attach(1, ['codigo' => '36269830', 'fecha_ingreso' => date("Y-m-d", strtotime('2018-04-01'))]);
        $agente2->liquidaciones()->attach(2, ['codigo' => '36269559', 'fecha_ingreso' => date("Y-m-d", strtotime('2018-04-01'))]);
    }
}
