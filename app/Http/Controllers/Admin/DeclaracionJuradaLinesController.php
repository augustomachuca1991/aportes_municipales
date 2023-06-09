<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DeclaracionJuradaLine;
use Illuminate\Http\Request;

class DeclaracionJuradaLinesController extends Controller
{
    protected $perPage = 5;

    public function getDeclarcionesJuradasLines($id)
    {
        return DeclaracionJuradaLine::whereHas('declaracionjurada', function ($declaracion) use ($id) {
            $declaracion->where('id', $id);
        })->paginate($this->perPage);
    }
}
