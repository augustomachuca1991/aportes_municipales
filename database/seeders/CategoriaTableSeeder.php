<?php

namespace Database\Seeders;

use App\Models\Categoria;
use Illuminate\Database\Seeder;

class CategoriaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categoria = Categoria::create([
            'codigo' => 1, 'categoria' => 'Docentes',  'created_at' => now()
        ]);

        $categoria->jurisdicciones()->attach(3);
    }
}
