<?php

namespace Database\Seeders;

use App\Models\Origen;
use Illuminate\Database\Seeder;

class OrigenTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $origenes = [
            ['codigo' => 1, 'origen' => 'Sisper', 'created_at' => now()],
            ['codigo' => 2, 'origen' => 'Municipio', 'created_at' => now()],
            ['codigo' => 3, 'origen' => 'Entidad Autonoma', 'created_at' => now()],
        ];
        Origen::insert($origenes);
    }
}
