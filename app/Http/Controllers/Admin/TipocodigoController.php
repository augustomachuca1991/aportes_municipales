<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tipocodigo;
use Illuminate\Http\Request;

class TipocodigoController extends Controller
{
    public function index()
    {
        return view('admin.tipocodigo.index');
    }


    public function getCodigos()
    {
        return Tipocodigo::with(['subtipocodigos' => function ($subtipos) {
            $subtipos->with(['conceptos' => function ($conceptos) {
                $conceptos->with('organismos');
            }]);
        }])->get();
    }


    public function searchTipoCodigo(Request $request)
    {
        $search = $request->search;
        return Tipocodigo::search($search)
            ->with('subtipocodigos')
            ->get();
    }

    public function orderTipoCodigo(Request $request)
    {

        if ($request->by) {
            $query =  Tipocodigo::with('subtipocodigos')
                ->orderBy('descripcion', 'ASC');
        } else {
            $query =  Tipocodigo::with(['subtipocodigos' => function ($subtipocodigos) {
                $subtipocodigos
                    ->orderBy('descripcion', 'ASC');
            }]);
        }

        return $query->get();
    }
}
