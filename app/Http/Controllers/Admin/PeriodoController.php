<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Periodo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class PeriodoController extends Controller
{
    public $perPage = 10;

    public function index()
    {
        return view('admin.periodo.index');
    }


    public function getPeriodos()
    {
        return Periodo::latest()->get();
    }


    public function store(Request $request)
    {
        $month = ['01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12'];

        $request->validate([
            'codigo' => ['unique:periodos,codigo'],
            'mes' => ['required', Rule::in($month)],
            'anio' => ['required', 'integer']
        ]);

        $periodo = Periodo::create([
            'codigo' => $request->codigo,
            'mes' => (int)$request->mes,
            'anio' => $request->anio,
            'periodo_milisegundos' => $request->periodo_milisegundos,
            'periodo' => $request->periodo
        ]);

        return $periodo;
    }


    public function filter(Request $request, Periodo $periodos)
    {
        $query = $periodos->newQuery();
        if ($request->anio) {
            $query->where('anio', $request->anio);
        }
        if ($request->mes) {
            $query->where('mes', $request->mes);
        }
        return $query->orderby('codigo', 'DESC')->paginate($this->perPage);
    }
}
