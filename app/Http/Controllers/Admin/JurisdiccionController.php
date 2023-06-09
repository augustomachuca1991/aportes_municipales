<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateJurisdiccionRequest;
use App\Models\Jurisdiccion;
use Illuminate\Http\Request;

class JurisdiccionController extends Controller
{

    protected $perPage = 10;

    public function index()
    {
        return view('admin.jurisdiccion.index');
    }


    public function getJurisdicciones()
    {
        return Jurisdiccion::with(['organismos', 'origen'])->paginate($this->perPage);
    }

    public function update(UpdateJurisdiccionRequest $request, $id)
    {
        $request->validated();
        $jurisdiccion = Jurisdiccion::find($id);
        $jurisdiccion->jurisdiccion = $request->jurisdiccion;
        $jurisdiccion->save();
        return $jurisdiccion->with(['origen', 'organismos'])->first();
    }

    public function search(Request $request)
    {
        $search = $request->search;
        $query = Jurisdiccion::autocompleteJurisdiccion($search);
        return $query->with(['organismos', 'origen'])->take(5)->get();
    }

    public function filter(Request $request, Jurisdiccion $jurisdicciones)
    {
        $query = $jurisdicciones->newQuery();

        return $query->filterForJurisdiccion($request->jurisdiccion_id)
            ->filterForOrigen($request->origen_id)
            ->with(['organismos', 'origen'])
            ->paginate($this->perPage);
    }
}
