<?php

namespace Database\Seeders;

use App\Models\TipoLiquidacion;
use Illuminate\Database\Seeder;

class TipoLiquidacionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tipo = [
            ['codigo' => 1, 'tipoliquidacion' => 'Sueldo', 'created_at' => now()],
            ['codigo' => 2, 'tipoliquidacion' => 'SAC', 'created_at' => now()],
        ];
        TipoLiquidacion::insert($tipo);
    }
}
