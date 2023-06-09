<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Concepto;
use Illuminate\Http\Request;

class ConceptoController extends Controller
{
    
    public function getConceptos()
    {
        return Concepto::infoConceptos()->get();
    }
}
