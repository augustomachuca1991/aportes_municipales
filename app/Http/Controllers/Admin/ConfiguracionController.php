<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Configuracion\UpdateRequest;
use App\Models\Configuracion;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\AssignOp\Concat;

class ConfiguracionController extends Controller
{

    public $perPage = 10;

    public function index()
    {
        return view('admin.configuracion.index');
    }


    public function getConfiguraciones()
    {
        return Configuracion::infoConfig()->get();
    }


    public function update(UpdateRequest $request, $id)
    {
        $configuracion = Configuracion::findOrFail($id);
        $configuracion->concepto->concepto = $request->concepto;
        $configuracion->tipocodigo_id = $request->tipoCodigo;
        $configuracion->subtipocodigo_id = $request->subtipoCodigo;
        $configuracion->push();
        return $configuracion->infoConfig()->first();
    }


    public function audit()
    {
        return view('admin.configuracion.audit');
    }


    public function getAudit(){
        $config = Configuracion::findOrFail(1);
        $all = $config->audits()->with('user')->get();
        return $all;
    }
}
