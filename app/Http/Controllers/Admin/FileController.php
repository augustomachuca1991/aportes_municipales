<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\File\{StoreRequest, UpdateRequest};
use App\Http\Requests\UpdateFileRequest;
use Illuminate\Http\Request;
use App\Models\File;
use App\Models\Organismo;
use App\Models\Periodo;
use App\Models\TipoLiquidacion;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\File as Csv;
use Illuminate\Support\Facades\Auth;

class FileController extends Controller
{

    public int $perPage = 10;


    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        return view('admin.file.index');
    }


    public function store(StoreRequest $request)
    {

        $file = $request->file('file');
        $path = $file->store('public');
        //$user_id = $request->user_id;
        $user_id = auth()->id();
        $name = $request->name;
        $periodo_id = Periodo::where('codigo', $request->periodo_id)->first()->id;
        $tipoliquidacion_id = TipoLiquidacion::where('codigo', $request->tipo_id)->first()->id;
        $organismo_id = Organismo::where('cuit', $request->organismo_id)->first()->id;
        $file = File::create([
            'user_id' => $user_id,
            'path' => $path,
            'name' => $name,
            'periodo_id' => $periodo_id,
            'tipoliquidacion_id' => $tipoliquidacion_id,
            'organismo_id' => $organismo_id,
            'status' => false,
            'apply' => false,
            'rectificar' => false,
        ]);
        return File::infoFile()->where('id', $file->id)->first();
    }


    public function update(UpdateRequest $request, $id)
    {

        $file = File::find($id);
        $path = Storage::url($file->path);
        Storage::putFileAs('historico', new Csv("./" . $path), $file->secuencia . '-' . $file->name);
        Storage::delete($file->path);
        $file->path = $request->file('file')->store('public');
        $file->secuencia += 1;
        $file->rectificar = true;
        $file->apply = false;
        $file->status = false;
        $file->save();
        return File::infoFile()->where('id', $file->id)->first();
    }


    public function getFiles($id)
    {

        return File::getFileOfUser(auth()->id())->infoFile()->latest()->get();
    }


    public function download(Request $request)
    {
        $pathToFile = storage_path('app/' . $request->path);
        $header = ['Content-Type' => 'text/csv'];
        return response()->download($pathToFile, 'descarga.csv', $header);
    }


    public function filter(Request $request, File $files)
    {

        $query = $files->newQuery();
        //$user_id = Auth::id();
        return $query
            ->getFileOfUser(auth()->id())
            ->filterText($request->text)
            ->filterPeriodo($request->periodo)
            ->filterTipo($request->tipo)
            ->infoFile()
            ->paginate($this->perPage);
    }
}
