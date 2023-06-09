<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RoleTableSeeder::class);
        $this->call(UserTableSeeder::class);
        //$this->call(FileTableSeeder::class);
        $this->call(TipoLiquidacionTableSeeder::class);
        $this->call(PeriodoTableSeeder::class);
        $this->call(OrigenTableSeeder::class);
        $this->call(EstadoTableSeeder::class);
        $this->call(FuncionTableSeeder::class);
        $this->call(JurisdiccionTableSeeder::class);
        //$this->call(CategoriaTableSeeder::class);
        //$this->call(ClaseTableSeeder::class);
        $this->call(OrganismoTableSeeder::class);
        // $this->call(DeclaracionJuradaTableSeeder::class);
        // $this->call(DeclaracionJuradaLineTableSeeder::class);
        // $this->call(LiquidacionTableSeeder::class);
        // $this->call(AgenteTableSeeder::class); //with table pivot
        $this->call(TipocodigoTableSeeder::class);
        $this->call(SubtipocodigoTableSeeder::class);
        //$this->call(ConceptoTableSeeder::class); //with table pivot
        $this->call(DepartamentoTableSeeder::class); //with table pivot
        //$this->call(HistoriaLaboralTableSeeder::class);
        //\App\Models\User::factory(10)->create();
    }
}
