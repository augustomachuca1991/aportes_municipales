<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Liquidacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LiquidacionController extends Controller
{

    public $perPage = 10;
    public $liquidaciones;

    public function index()
    {
        return view('admin.liquidacion.index');
    }


    public function getLiquidaciones()
    {
        $this->liquidaciones = Liquidacion::infoLiquidaciones();
        $liquidaciones = $this->liquidaciones;
        $sum = $liquidaciones->sum('basico');
        return response()->json(['total_sum' => $sum, 'liquidaciones' => $liquidaciones->paginate($this->perPage)]);
    }


    public function filter(Request $request, Liquidacion $liquidacion)
    {

        $query = $liquidacion->newQuery();

        return $query->filterForAgente($request->text)
            ->filterForOrganismo($request->organismo_id)
            ->filterForAnio($request->anio)
            ->filterForMes($request->mes)
            ->filterForTipoLiquidacion($request->tipoliquidacion_id)
            ->infoLiquidaciones()
            ->paginate($this->perPage);

        // $sum = $liquidaciones->sum('basico');
        // return response()->json(['sum' => $sum , 'liquidaciones' => $liquidaciones->paginate($this->perPage)]);

    }
}
