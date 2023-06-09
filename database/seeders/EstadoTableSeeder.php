<?php

namespace Database\Seeders;

use App\Models\Estado;
use Illuminate\Database\Seeder;

class EstadoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $estados = [
            ['codigo' => 1, 'estado' => 'Activo'],
            ['codigo' => 2, 'estado' => 'Pendiente'],
            ['codigo' => 3, 'estado' => 'Anulado'],
            ['codigo' => 4, 'estado' => 'Baja'],
            ['codigo' => 5, 'estado' => 'Promocion'],
            ['codigo' => 6, 'estado' => 'Retirado'],
            ['codigo' => 7, 'estado' => 'Incapacidad laboral Temporaria (ILT)'],
            ['codigo' => 8, 'estado' => 'Baja por Documento Erróneo'],
            ['codigo' => 9, 'estado' => 'Licencia sin Goce de Haberes'],
            ['codigo' => 10, 'estado' => 'Suplencia'],
            ['codigo' => 11, 'estado' => 'Interino'],
            ['codigo' => 12, 'estado' => 'Retención Cargo (Suplencia Docentes)'],
            ['codigo' => 13, 'estado' => 'Baja en Trámite'],
            ['codigo' => 14, 'estado' => 'Retención Cargo (Por Mayor Designación)'],
            ['codigo' => 15, 'estado' => 'Cesantia'],
            ['codigo' => 16, 'estado' => 'Exoneracion'],
            ['codigo' => 18, 'estado' => 'Retiro Voluntario'],
            ['codigo' => 19, 'estado' => 'Retiro Obligatorio'],
            ['codigo' => 21, 'estado' => 'Baja Retiro Voluntario ley 5430'],
            ['codigo' => 22, 'estado' => 'BOCEP'],
            ['codigo' => 23, 'estado' => 'Activo/Pendiente'],
            ['codigo' => 24, 'estado' => 'Suplen/Pendiente'],
            ['codigo' => 25, 'estado' => 'Interino/Pendiente'],
            ['codigo' => 26, 'estado' => 'Activa.de Lic y/o Retec. /Pendiente'],
            ['codigo' => 27, 'estado' => 'Retiro Voluntario Anticipado ley 5430'],
            ['codigo' => 28, 'estado' => 'Ad Honorem'],
            ['codigo' => 29, 'estado' => 'Incompatib. de Horas'],
            ['codigo' => 30, 'estado' => 'Baja Con Aguinaldo'],
            ['codigo' => 31, 'estado' => 'Baja con deuda'],
            ['codigo' => 32, 'estado' => 'Baja por Termino de Suplencia'],
            ['codigo' => 33, 'estado' => 'Sujeto a Control'],
            ['codigo' => 34, 'estado' => 'Complementaria'],
        ];
        Estado::Insert($estados);


            
    }
}
