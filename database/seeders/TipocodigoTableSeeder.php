<?php

namespace Database\Seeders;

use App\Models\Tipocodigo;
use Illuminate\Database\Seeder;

class TipocodigoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tipocodigo = [
            ['codigo'=> 1,'descripcion' => 'Remunerativo', 'created_at' => now()],
            ['codigo'=> 2,'descripcion' => 'Remunerativo Bonificable', 'created_at' => now()],
            ['codigo'=> 3,'descripcion' => 'Remunerativo No Bonificable', 'created_at' => now()],
            ['codigo'=> 4,'descripcion' => 'No Remunerativo No Bonificable', 'created_at' => now()],
            ['codigo'=> 5,'descripcion' => 'Adicionales Sociales', 'created_at' => now()],
            ['codigo'=> 6,'descripcion' => 'Descuento', 'created_at' => now()],
        ];
        Tipocodigo::insert($tipocodigo);
    }
}
