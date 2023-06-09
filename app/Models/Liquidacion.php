<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Liquidacion extends Model
{
    use HasFactory, SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $fillable = [
        'declaracionjurada_id',
        'bruto',
        'basico',
        'antiguedad',
        'aporte_personal',
        'haberes_con_aporte',
        'bonificable',
        'no_bonificable',
        'no_remunerativo',
        'familiar',
        'descuento',
        'remunerativo',
        'adicionales',
        'hijo',
        'esposa'
    ];


    public function declaracionjurada()
    {
        return $this->belongsTo(DeclaracionJurada::class);
    }


    public function agentes()
    {
        return $this->belongsToMany(Agente::class)->withPivot('codigo', 'fecha_ingreso', 'fecha_egreso');
    }

    public function conceptos()
    {
        return $this->belongsToMany(Concepto::class)->withPivot('codigo', 'importe');
    }

    public function historiaslaborales()
    {
        return $this->hasMany(HistoriaLaboral::class);
    }


    public function clases()
    {
        return $this->belongsToMany(Clase::class, 'historia_laborals')->withPivot('codigo', 'cargo', 'estado_id', 'funcion_id', 'fecha_inicio', 'fecha_fin');
    }


    public function scopeInfoLiquidaciones(Builder $query)
    {
        $query->with(['agentes', 'conceptos' => function($conceptos){
            $conceptos->with(['subtipocodigo' => function($subtipo){
                $subtipo->with('tipocodigo');
            }]);
        },'declaracionjurada' => function($ddjj){
            $ddjj->with(['tipoliquidacion','periodo','file' => function($file){
                $file->with('user');
            },'organismo' => function($organismo){
                $organismo->with(['jurisdiccion' => function($jurisdiccion){
                    $jurisdiccion->with('origen');
                }]);
            }]);
        }, 'clases']);
    }


    public function scopeFilterForAgente(Builder $query, $text) {

        if ($text) {
            $query->whereHas( 'agentes' , function($agentes) use ($text){
                $agentes->where('agentes.nombre' , 'LIKE', "%" . $text . "%")
                ->orWhere('agentes.cuil' , 'LIKE', "%" . $text . "%");
            });
        }
    }


    public function scopeFilterForOrganismo(Builder $query, $organismoId) {

        if ($organismoId) {
            $query->whereHas('declaracionjurada' , function($declaracionjurada) use ($organismoId){
                $declaracionjurada->whereHas('organismo' , function($organismo) use ($organismoId) {
                    $organismo->where('id' , $organismoId);
                });
            });
        }
    }


    public function scopeFilterForJurisdiccion(Builder $query, $jurisdiccionId) {

        if ($jurisdiccionId) {
            $query->whereHas('declaracionjurada' , function($declaracionjurada) use ($jurisdiccionId){
                $declaracionjurada->whereHas('organismo' , function($organismo) use ($jurisdiccionId) {
                    $organismo->whereHas('jurisdiccion' , function($jurisdiccion) use ($jurisdiccionId){
                        $jurisdiccion->where('id' , $jurisdiccionId);
                    });
                });
            });
        }
    }


    public function scopeFilterForOrigen(Builder $query, $origenId) {

        if ($origenId) {
            $query->whereHas('declaracionjurada' , function($declaracionjurada) use ($origenId){
                $declaracionjurada->whereHas('organismo' , function($organismo) use ($origenId) {
                    $organismo->whereHas('jurisdiccion' , function($jurisdiccion) use ($origenId){
                        $jurisdiccion->whereHas('origen' , function($origen) use ($origenId){
                            $origen->where('id' , $origenId);
                        });
                    });
                });
            });
        }
    }


    public function scopeFilterForAnio(Builder $query, $year) {

        if ($year) {
            $query->whereHas('declaracionjurada' , function($ddjj) use ($year){
                $ddjj->whereHas('periodo' , function($periodo) use ($year){
                    $periodo->where('anio' , $year);
                });
            });
        }
    }

    public function ScopeFilterForMes(Builder $query, $month)
    {
        if ($month) {
            $query->whereHas('declaracionjurada' , function($ddjj) use ($month){
                $ddjj->whereHas('periodo' , function($periodo) use ($month){
                    $periodo->where('mes' , $month);
                });
            });
        }
    }


    public function ScopeFilterForTipoLiquidacion(Builder $query, $tipo)
    {
        if ($tipo) {
            $query->whereHas('declaracionjurada' , function($ddjj) use ($tipo){
                $ddjj->whereHas('tipoliquidacion' , function($tipoliquidacion) use ($tipo){
                    $tipoliquidacion->where('id' , $tipo);
                });
            });
        }
    }


    public function ScopeFilterFromTo(Builder $query, $from, $to){

        if($from && $to){
            $query->whereHas('declaracionjurada', function($ddjj) use ($from,$to){
                $ddjj->whereHas('periodo', function ($periodo) use ($from, $to){
                    $periodo->whereBetween('codigo' , [$from , $to]);
                });
            });
        }
    }
}
