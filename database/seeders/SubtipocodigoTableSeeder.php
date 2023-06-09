<?php

namespace Database\Seeders;

use App\Models\Subtipocodigo;
use Illuminate\Database\Seeder;

class SubtipocodigoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $subtipo = [
            ['codigo'=> 1,'descripcion' => 'Sueldo Basico',      'tipocodigo_id' => 1, 'created_at' => now()],
            ['codigo'=> 2,'descripcion' => 'Antiguedad',         'tipocodigo_id' => 1, 'created_at' => now()],
            ['codigo'=> 3,'descripcion' => 'Adicional',          'tipocodigo_id' => 2, 'created_at' => now()],
            ['codigo'=> 4,'descripcion' => 'Adicional',          'tipocodigo_id' => 3, 'created_at' => now()],
            ['codigo'=> 5,'descripcion' => 'Adicional',          'tipocodigo_id' => 4, 'created_at' => now()],
            ['codigo'=> 6,'descripcion' => 'Salario Familiar',      'tipocodigo_id' => 5, 'created_at' => now()],
            ['codigo'=> 7,'descripcion' => 'Hijo',               'tipocodigo_id' => 5, 'created_at' => now()],
            ['codigo'=> 8,'descripcion' => 'Esposa',             'tipocodigo_id' => 5, 'created_at' => now()],
            ['codigo'=> 9,'descripcion' => 'Aporte Jubilatorio', 'tipocodigo_id' => 6, 'created_at' => now()],
            ['codigo'=> 10,'descripcion' => 'Sobre Remunerativo', 'tipocodigo_id' => 6, 'created_at' => now()],
            ['codigo'=> 11,'descripcion' => 'Otros',              'tipocodigo_id' => 6, 'created_at' => now()],
        ];
        Subtipocodigo::insert($subtipo);
    }
}
