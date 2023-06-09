<?php

namespace Database\Seeders;

use App\Models\Clase;
use Illuminate\Database\Seeder;

class ClaseTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $clases = [
            ['codigo' => 1, 'categoria_id' => 1, 'clase' => 'Auxiliar de direccion',            'created_at' => now()],
            ['codigo' => 2, 'categoria_id' => 1, 'clase' => 'Bibliotecario',                    'created_at' => now()],
            ['codigo' => 3, 'categoria_id' => 1, 'clase' => 'Director de escuela común de 1ra', 'created_at' => now()],
            ['codigo' => 4, 'categoria_id' => 1, 'clase' => 'Maestro de Grado Escuela comun',   'created_at' => now()],

        ];

        Clase::insert($clases);
    }
}
