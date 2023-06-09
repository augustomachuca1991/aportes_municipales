<?php

namespace App\Imports;

use App\Models\Agente;
use App\Models\Categoria;
use App\Models\Clase;
use App\Models\Concepto;
use App\Models\DeclaracionJurada;
use App\Models\DeclaracionJuradaLine;
use App\Models\Departamento;
use App\Models\Estado;
use App\Models\File;
use App\Models\Liquidacion;
use App\Models\Organismo;
use App\Models\Origen;
use App\Models\Periodo;
use App\Models\TipoLiquidacion;
use App\Models\User;
use App\Notifications\FailedRowNotification;
use App\Notifications\ProcessedRowNotification;
use Exception;
//use App\Jobs\FailedRowJob;
use Illuminate\Support\Collection;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rules\Exists;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\RemembersChunkOffset;
use Maatwebsite\Excel\Concerns\RemembersRowNumber;
use Maatwebsite\Excel\Concerns\WithCustomCsvSettings;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Validators\Failure;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Events\BeforeImport;

class DeclaracionesJuradasImport implements ToCollection, WithHeadingRow, WithChunkReading, ShouldQueue, WithCustomCsvSettings, WithValidation, SkipsOnFailure, WithEvents
{

    use Importable, RemembersChunkOffset, RemembersRowNumber, SkipsFailures;

    protected $file;
    protected $declararacionJurada;
    protected $declararacionJuradaLine;
    protected $periodo;
    protected $tipo;
    protected $origen;
    protected $organismo;
    protected $detalleJson;
    protected $conceptos;
    protected $agente;
    protected $categoria;
    protected $jurisdiccion;
    protected $clase;
    protected $liquidacion;
    protected $estado;

    public $totalRows;
    public $countCicles = 0;
    public $countError = 0;


    public function __construct(File $file)
    {
        $this->file = $file;
        $this->organismo = Organismo::find($file->organismo_id);
    }



    
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function collection(Collection $rows)
    {
        // $chunkOffset = $this->getChunkOffset() - 2;
        // $currentRowNumber = $this->getRowNumber();
        // $count = ($chunkOffset / 100) + 1;
        // $cicles = intdiv($this->totalRows, $rows->count());
        $this->createddjj();
        foreach ($rows as $index => $row) {
            // DB::beginTransaction();
            // try {
                $this->createddjjlines($row);
                $this->createConcepto();
                $this->createAgente();
                $this->createCategoria();
                $this->createClase();
                $this->createLiquidacion();
                $this->createPuesto();
                $this->createEstado();
                $this->createHistoriaLaboral();
            //     DB::commit();
            // } catch (Exception $e) {
            //     DB::rollback();
            // } catch (\Throwable $e) {
            //     DB::rollback();
            // }
        }
        $message = ($this->totalRows - $this->countError) . '/' . $this->totalRows . ' registros se procesaron correctamente';
        $user = User::find($this->file->user->id);
        $user->notify(new ProcessedRowNotification($message));
        //$notificationJob = new NotificationJob($this->importedBy, $message);

    }



    public function onFailure(Failure ...$failures)
    {
        if (!empty($failures)) {
            $this->countError += 1;
            foreach ($failures as $key => $failure) {
                $user = User::find($this->file->user->id);
                $user->notify(new FailedRowNotification($failure, $this->file->name));
            }
        }
    }


    
    public function registerEvents(): array
    {
        return [
            BeforeImport::class => function (BeforeImport $event) {
                $totalRows = $event->getReader()->getTotalRows();
                if (!empty($totalRows)) {
                    $this->totalRows = $totalRows['Worksheet'] - 1;
                    Log::channel('daily')->info('before import', [
                        'total Rows' => $this->totalRows
                    ]);
                }
            },
        ];
    }





    public function rules(): array
    {
        return [
            '*.nombre' => ['required'],
            '*.cuil' => ['required', 'integer', 'digits_between:10,11'],
            '*.fecha_nac' => ['required', 'date'],
            '*.sexo' => ['required', 'string'],
            '*.cod_estado_civil' => ['required'],
            '*.puesto_laboral' => ['integer', 'nullable'],
            '*.cargo' => ['required', 'string'],
            '*.fecha_ingreso' => ['required', 'date'],
            '*.fecha_egreso' => ['date', 'nullable'],

            '*.nl_desde_nro' => ['integer', 'nullable'],
            '*.nl_hasta_nro' => ['integer', 'nullable'],
            '*.nl_desde_anio' => ['integer', 'nullable'],
            '*.nl_hasta_anio' => ['integer', 'nullable'],
            '*.nl_desde_otro' => ['string', 'nullable'],
            '*.nl_hasta_otro' => ['string', 'nullable'],

            '*.cod_categoria' => ['required', 'integer'],
            '*.categoria' => ['required', 'string'],
            '*.cod_clase' => ['required', 'integer'],
            '*.clase' => ['required', 'string'],
            '*.cod_estado' => ['required', 'integer'],
            '*.cod_organismo' => ['required', 'integer'],
            //'*.cuit_organismo' => ['required', 'integer', 'digits_between:10,11'],
            '*.cod_funcion' => ['integer', 'nullable'],
            '*.detalle' => ['required', 'string'],
        ];
    }


    public function batchSize(): int
    {
        return 1000;
    }

    public function chunkSize(): int
    {
        return 1000;
    }

    protected function createddjj()
    {
        $this->declararacionJurada = DeclaracionJurada::create([
            'file_id' => $this->file->id,
            'periodo_id' => $this->file->periodo_id,
            'tipoliquidacion_id' => $this->file->tipoliquidacion_id,
            'organismo_id' => $this->file->organismo_id
            //'origen_id' => $this->origen->id
        ]);
    }


    protected function createddjjlines($row)
    {
        $this->declararacionJuradaLine = DeclaracionJuradaLine::create(
            [
                'declaracionjurada_id' => $this->declararacionJurada->id,
                'nombre' => $row['nombre'],
                'cuil' => $row['cuil'],
                'fecha_nac' => date('Y-m-d', strtotime($row['fecha_nac'])),
                'sexo' => $row['sexo'],
                'cod_estado_civil' => $row['cod_estado_civil'],
                'puesto_laboral' => $row['puesto_laboral'],
                'cargo' => $row['cargo'],
                'fecha_ingreso' => date('Y-m-d', strtotime($row['fecha_ingreso'])),
                'fecha_egreso' => date('Y-m-d', strtotime($row['fecha_ingreso'])),
                'nl_desde_nro' => $row['nl_desde_nro'],
                'nl_hasta_nro' => $row['nl_hasta_nro'],
                'nl_desde_anio' => $row['nl_desde_anio'],
                'nl_hasta_anio' => $row['nl_hasta_anio'],
                'nl_desde_otro' => $row['nl_desde_otro'],
                'nl_hasta_otro' => $row['nl_hasta_otro'],
                'cod_categoria' => $row['cod_categoria'],
                'categoria' => $row['categoria'],
                'cod_clase' => $row['cod_clase'],
                'clase' => $row['clase'],
                'cod_estado' => $row['cod_estado'],
                'cod_organismo' => $this->organismo->codigo,
                'cuit_organismo' => $this->organismo->cuit,
                'detalle' => $row['detalle'],
                //'estado' => $row['estado'],
                // 'cod_organismo' => $row['cod_organismo'],
                // 'cod_funcion' => $row['cod_funcion'],
                //'funcion' => $row['funcion'],
            ]
        );
        $this->detalleJson = $this->jsondetalle($this->declararacionJuradaLine->detalle);
        //Log::channel('daily')->info('json detalle', $this->detalleJson);
    }


    protected function createConcepto()
    {

        $organismo_id = Organismo::where('codigo',$this->declararacionJuradaLine->cod_organismo)->first()->id;

        foreach ($this->detalleJson as $index => $value) {
            $existConcepto = Concepto::whereHas('organismos', function ($organismos) use ($organismo_id) {
                $organismos->where('organismos.codigo', $organismo_id);
            })->where('codigo', $value['codigo']);
            if ($existConcepto->doesntExist()) {
                $concepto = Concepto::create([
                    'codigo' => $value['codigo'],
                    'concepto' => $value['concepto'],
                    'unidad' => $value['unidad'],
                    'subtipocodigo_id' => $value['subtipo'],
                ]);
                $concepto->organismos()->attach($organismo_id, ['codigo' => $value['codigo']]);
                $concepto->departamentos()->attach(1, [
                    'user_id' => $this->file->user_id,
                    'subtipocodigo_id' => $value['subtipo'],
                    'tipocodigo_id' => $concepto->subtipocodigo->tipocodigo_id

                ]);
                $this->conceptos[$index] = $concepto;
                
            } else {
                $this->conceptos[$index] = $existConcepto->first();
            }
        }
    }

    protected function createAgente()
    {

        $existAgente = Agente::where('cuil', $this->declararacionJuradaLine->cuil);
        if ($existAgente->doesntExist()) {
            $this->agente = Agente::create([
                'nombre' => $this->declararacionJuradaLine->nombre,
                'cuil' => $this->declararacionJuradaLine->cuil,
                'fecha_nac' => date("Y-m-d", strtotime($this->declararacionJuradaLine->fecha_nac)),
                'sexo' => $this->declararacionJuradaLine->sexo,
            ]);
        } else {
            $this->agente = $existAgente->first();
        }
        $noExiste = $this->agente->organismos()->where('organismos.id' , $this->organismo->id)->doesntExist();
        if ($noExiste) {
            # code...
            $this->agente->organismos()->attach($this->organismo->id);
        }

    }


    public function createCategoria()
    {
        $this->jurisdiccion = Organismo::where('codigo', $this->declararacionJuradaLine->cod_organismo)->first()->jurisdiccion;
        $existCategoria = Categoria::where('codigo', $this->declararacionJuradaLine->cod_categoria)
            ->whereHas('jurisdicciones', function ($jurisdicciones) {
                $jurisdicciones->where('jurisdiccion_id', $this->jurisdiccion->id);
            });
        if ($existCategoria->doesntExist()) {
            $this->categoria = Categoria::create([
                'codigo' => $this->declararacionJuradaLine->cod_categoria,
                'categoria' => $this->declararacionJuradaLine->categoria,
            ]);
            $this->categoria->jurisdicciones()->attach($this->jurisdiccion->id);
        } else {
            $this->categoria = $existCategoria->first();
        }
    }



    public function createClase()
    {
        $existClase = Clase::where('codigo', $this->declararacionJuradaLine->cod_clase)
            ->whereHas('categoria', function ($categoria) {
                $categoria->where('id', $this->categoria->id);
            });
        if ($existClase->doesntExist()) {
            $this->clase = Clase::create([
                'codigo' => $this->declararacionJuradaLine->cod_clase,
                'categoria_id' => $this->categoria->id,
                'clase' => $this->declararacionJuradaLine->clase,
            ]);
        } else {
            $this->clase = $existClase->first();
        }
    }



    public function createLiquidacion()
    {

        $this->liquidacion  = new Liquidacion();
        $this->liquidacion->declaracionjurada_id = $this->declararacionJurada->id;
        $this->liquidacion->save();
        foreach ($this->conceptos as $index => $concepto) {
            $tipocodigo = $concepto->subtipocodigo->tipocodigo->codigo;
            $subtipocodigo = $concepto->subtipocodigo->codigo;
            switch ($tipocodigo) {
                case '1':
                    # remunerativo
                    $this->liquidacion->remunerativo += $this->detalleJson[$index]['importe'];
                    break;
                case '2':
                    # remunerativo bonificable
                    $this->liquidacion->bonificable += $this->detalleJson[$index]['importe'];
                    break;
                case '3':
                    # remunerativo no bonificable
                    $this->liquidacion->no_bonificable += $this->detalleJson[$index]['importe'];
                    break;
                case '4':
                    # no remunerativo no bonificable
                    $this->liquidacion->no_remunerativo += $this->detalleJson[$index]['importe'];
                    break;
                case '5':
                    # adicional social
                    $this->liquidacion->adicionales += $this->detalleJson[$index]['importe'];
                    break;
                case '6':
                    # descuento
                    $this->liquidacion->descuento += $this->detalleJson[$index]['importe'];
                    break;
                default:
                    # code...
                    break;
            }

            switch ($subtipocodigo) {
                case '1':
                    # basico
                    $this->liquidacion->basico = $this->detalleJson[$index]['importe'];
                    break;
                case '2':
                    # antiguedad
                    $this->liquidacion->antiguedad = $this->detalleJson[$index]['importe'];
                    break;
                case '6':
                    # familiar
                    $this->liquidacion->familiar = $this->detalleJson[$index]['importe'];
                    break;
                case '7':
                    # hijo
                    $this->liquidacion->hijo = $this->detalleJson[$index]['importe'];
                    break;
                case '8':
                    # esposa
                    $this->liquidacion->esposa = $this->detalleJson[$index]['importe'];
                    break;
                case '9':
                    # aporte jubilatorio
                    $this->liquidacion->aporte_personal = $this->detalleJson[$index]['importe'];
                    break;
                default:
                    # code...
                    break;
            }
            $this->liquidacion->conceptos()->attach($concepto->id, ['importe' => $this->detalleJson[$index]['importe']]);
        }
        $this->liquidacion->save();
    }


    public function createPuesto()
    {
        $this->agente->liquidaciones()->attach($this->liquidacion->id, [
            'codigo' => $this->declararacionJuradaLine->puesto_laboral,
            'fecha_ingreso' => $this->declararacionJuradaLine->fecha_ingreso
        ]);
    }


    public function createEstado()
    {
        $existEstado = Estado::where('codigo', $this->declararacionJuradaLine->cod_estado);

        if ($existEstado->doesntExist()) {
            $this->estado = Estado::create([
                'codigo' => $this->declararacionJuradaLine->cod_estado,
                'estado' => 'nuevo estado',
            ]);
        } else {
            $this->estado = $existEstado->first();
        }
    }


    public function createHistoriaLaboral()
    {
        $this->liquidacion->clases()->attach($this->clase->id, [
            'codigo' => $this->agente->id,
            'estado_id' => $this->declararacionJuradaLine->cod_estado,
            'funcion_id' => 1,
            'cargo' => $this->declararacionJuradaLine->cargo,
            'fecha_inicio' => $this->declararacionJuradaLine->fecha_ingreso,
            'fecha_fin' => now()->endOfMonth()->modify('0 month')->toDateString(),

        ]);
    }




    protected function jsonDetalle($detalle)
    {
        $string = '1@basico@30 dias@1@5000|2@antiguedad@2 anios@2@30000|3@adicional@-@3@12500';
        $explode = explode('|', $string);
        foreach ($explode as $key => $value) {
            $detalles[$key]['codigo'] = explode('@', $value)[0];
            $detalles[$key]['concepto'] = explode('@', $value)[1];
            $detalles[$key]['unidad'] = explode('@', $value)[2];
            $detalles[$key]['subtipo'] = explode('@', $value)[3];
            $detalles[$key]['importe'] = explode('@', $value)[4];
        }
        return $detalles;
    }



    public function getCsvSettings(): array
    {
        return [
            'delimiter' => ';',
            'enclosure' => '',
            'input_encoding' => 'UTF-8'
        ];
    }
}
