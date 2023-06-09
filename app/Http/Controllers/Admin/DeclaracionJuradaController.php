<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Imports\DeclaracionesJuradasImport;
use App\Imports\DeclaracionesJuradasRectify;
use App\Jobs\FinishImportJob;
use Illuminate\Http\Request;
use App\Models\DeclaracionJurada;
use App\Models\DeclaracionJuradaLine;
use App\Models\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File as Csv;

class DeclaracionJuradaController extends Controller
{
    protected $extension = 'csv';
    protected $perPage = 5;

    public function index()
    {
        return view('admin.declaracionjurada.index');
    }


    public function show($id)
    {
        return DeclaracionJuradaLine::whereHas('declaracionjurada', function ($ddjj) use ($id) {
            $ddjj->where('id', $id);
        })->paginate($this->perPage);
    }

    public function getDeclarcionesJuradas()
    {
        return DeclaracionJurada::ddjjInfo()
            ->latest()
            ->paginate($this->perPage);
    }


    public function store(Request $request)
    {
        $file = File::find($request->file_id);
        $path = Storage::url($file->path);
        $binary = Storage::putFileAs('public', new Csv("./" . $path), 'import.' . $this->extension);
        $import = new DeclaracionesJuradasImport($file);
        $import->queue($binary)->chain([new FinishImportJob($file)]);
        Storage::disk('public')->delete('import.csv');
        $file->status = true;
        $file->save();
        return File::infoFile()->where('id', $file->id)->first();
    }


    public function update($id)
    {
        $file = File::find($id);
        $path = Storage::url($file->path);
        $binary = Storage::putFileAs('public', new Csv("./" . $path), 'rectify.' . $this->extension);
        $import = new DeclaracionesJuradasRectify($file);
        $import->queue($binary)->chain([new FinishImportJob($file)]);
        Storage::disk('public')->delete('rectify.csv');
        $file->status = true;
        $file->save();
        return File::infoFile()->where('id', $file->id)->first();
    }


    public function filter(Request $request, DeclaracionJurada $declaracionesJuradas)
    {

        $query = $declaracionesJuradas->newQuery();
        return $query
            ->searchText($request->text)
            ->filterOrganismo($request->organismo_id)
            ->filterAnio($request->anio)
            ->filterMes($request->mes)
            ->ddjjInfo()
            ->latest()
            ->paginate($this->perPage);
    }
}
