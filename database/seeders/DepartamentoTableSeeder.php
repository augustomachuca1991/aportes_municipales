<?php

namespace Database\Seeders;

use App\Models\Departamento;
use Illuminate\Database\Seeder;

class DepartamentoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dpto = [
            ['codigo' => 1, 'departamento' => 'Recurso y Contralor', 'created_at' => now()],
            ['codigo' => 2, 'departamento' => 'departamento 2', 'created_at' => now()]

        ];
        Departamento::insert($dpto);
    }
}
