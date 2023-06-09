<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TipoLiquidacion;
use Illuminate\Http\Request;

class TipoLiquidacionController extends Controller
{
    public function getTipos(){
        return TipoLiquidacion::all();
    }
}
