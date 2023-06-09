<?php

namespace Database\Seeders;

use App\Models\Liquidacion;
use Illuminate\Database\Seeder;

class LiquidacionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $liquidaciones = [
            [
                'declaracionjurada_id' => 1,
                'bruto' => 10,
                'basico' => 11,
                'antiguedad' => 12,
                'aporte_personal' => 13,
                'haberes_con_aporte' => 13,
                'remunerativo' => 13,
                'bonificable' => 13,
                'no_bonificable' => 13,
                'no_remunerativo' => 13,
                'adicionales' => 13,
                'familiar' => 13,
                'hijo' => 13,
                'esposa' => 13,
                'descuento' => 13,

            ],
            [
                'declaracionjurada_id' => 1,
                'bruto' => 10,
                'basico' => 11,
                'antiguedad' => 12,
                'aporte_personal' => 13,
                'haberes_con_aporte' => 13,
                'remunerativo' => 13,
                'bonificable' => 13,
                'no_bonificable' => 13,
                'no_remunerativo' => 13,
                'adicionales' => 13,
                'familiar' => 13,
                'hijo' => 13,
                'esposa' => 13,
                'descuento' => 13,

            ],

        ];
        Liquidacion::insert($liquidaciones);
    }
}
