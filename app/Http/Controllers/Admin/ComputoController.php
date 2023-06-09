<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Liquidacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ComputoController extends Controller
{
    public function index()
    {
        return view('admin.computo.index');
    }


    public function filter(Request $request, Liquidacion $liquidaciones)
    {
        $request->validate([
            'desde' => 'required_with:hasta|lte:hasta',
            'hasta' => 'required_with:desde|gte:desde'

        ]);
        $query = $liquidaciones->newQuery();
        $data = $query->filterForAgente($request->text)
            ->filterForOrganismo($request->organismo_id)
            ->filterForJurisdiccion($request->jurisdiccion_id)
            ->filterForOrigen($request->origen_id)
            ->filterFromTo($request->desde, $request->hasta)
            ->filterForTipoLiquidacion($request->tipoliquidacion_id)
            ->infoLiquidaciones();

        $query2 = $liquidaciones->newQuery();
        $totales = $query2->filterForAgente($request->text)
            ->filterForOrganismo($request->organismo_id)
            ->filterForJurisdiccion($request->jurisdiccion_id)
            ->filterForOrigen($request->origen_id)
            ->filterFromTo($request->desde, $request->hasta)
            ->filterForTipoLiquidacion($request->tipoliquidacion_id)
            ->select(
                DB::raw('SUM(bruto) as total_bruto'),
                DB::raw('SUM(basico) as total_basico'),
                DB::raw('SUM(antiguedad) as total_antiguedad'),
                DB::raw('SUM(aporte_personal) as total_aporte_personal'),
                DB::raw('SUM(haberes_con_aporte) as total_haberes_con_aporte'),
                DB::raw('SUM(remunerativo) as total_remunerativo'),
                DB::raw('SUM(bonificable) as total_bonificable'),
                DB::raw('SUM(no_bonificable) as total_no_bonificable'),
                DB::raw('SUM(no_remunerativo) as total_no_remunerativo'),
                DB::raw('SUM(adicionales) as total_adicionales'),
                DB::raw('SUM(familiar) as total_familiar'),
                DB::raw('SUM(descuento) as total_descuento'),
            )->groupByRaw('bruto , basico, antiguedad, aporte_personal, haberes_con_aporte, remunerativo, bonificable , no_bonificable, no_remunerativo, adicionales, familiar, descuento')->first();
        return response()->json(['totales' => $totales, 'computos' => $data->paginate(10)]);
    }
}
