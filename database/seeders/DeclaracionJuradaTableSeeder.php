<?php

namespace Database\Seeders;

use App\Models\DeclaracionJurada;
use Illuminate\Database\Seeder;

class DeclaracionJuradaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $declaracionjurada = [
            'file_id' => 1,
            'periodo_id' => 1,
            'tipoliquidacion_id' => 1,
            'organismo_id' => 1,

        ];
        DeclaracionJurada::create($declaracionjurada);
    }
}
