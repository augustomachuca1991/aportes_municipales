<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Categoria\UpdateRequest;
use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{

    public $perPage = 10;

    public function index()
    {
        return view('admin.categoria.index');
    }


    public function update(UpdateRequest $request, $id)
    {

        $categoria = Categoria::where('id', $id)->infoCategorias()->first();
        $categoria->categoria = $request->categoria;
        $categoria->save();
        return $categoria;
    }


    public function filter(Request $request, Categoria $categorias)
    {

        $query = $categorias->newQuery();

        return $query
            ->infoCategorias()
            ->filterText($request->text)
            ->paginate($this->perPage);
    }
}
