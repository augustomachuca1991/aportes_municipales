<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Subtipocodigo;
use Illuminate\Http\Request;

class SubtipocodigoController extends Controller
{
    public function getSubcodigos()
    {
        return Subtipocodigo::all();
    }
}
