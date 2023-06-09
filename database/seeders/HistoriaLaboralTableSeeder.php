<?php

namespace Database\Seeders;

use App\Models\HistoriaLaboral;
use Illuminate\Database\Seeder;

class HistoriaLaboralTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $historiasLaborales = [
            ['codigo' => 1, 'liquidacion_id' => 1, 'clase_id' => 1, 'estado_id' => 1, 'funcion_id' => 1, 'cargo'  => 'cargo 1', 'fecha_inicio' => now()->subMinutes(rand(1, 55)), 'fecha_fin' => now()->endOfMonth()->modify('0 month')->toDateString(), 'created_at' => now()],
            ['codigo' => 2, 'liquidacion_id' => 2, 'clase_id' => 2, 'estado_id' => 1, 'funcion_id' => 1, 'cargo'  => 'cargo 2', 'fecha_inicio' => now()->subMinutes(rand(1, 55)), 'fecha_fin' => now()->endOfMonth()->modify('0 month')->toDateString(), 'created_at' => now()],

        ];
        HistoriaLaboral::insert($historiasLaborales);
    }
}
