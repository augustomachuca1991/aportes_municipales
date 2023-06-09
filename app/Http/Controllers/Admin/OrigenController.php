<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Origen\UpdateRequest;
use App\Models\Origen;
use Illuminate\Http\Request;

class OrigenController extends Controller
{
    public $perPage = 10;

    public function index()
    {
        return view('admin.origen.index');
    }


    public function getOrigenes()
    {
        return Origen::infoOrigenes()->get();
    }


    public function update(UpdateRequest $request, $id)
    {
        $origen = Origen::where('id', $id)->infoOrigenes()->first();
        $origen->origen = $request->origen;
        $origen->save();
        return $origen;
    }


    public function filter(Request $request, Origen $origenes)
    {
        $query = $origenes->newQuery();
        return $query
            ->filterOrganismo($request->text)
            ->infoOrigenes()
            ->paginate($this->perPage);
    }
}
