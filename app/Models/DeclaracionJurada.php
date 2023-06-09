<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DeclaracionJurada extends Model
{
    use HasFactory, SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $fillable = ['file_id', 'periodo_id', 'tipoliquidacion_id', 'organismo_id'];

    public function organismo()
    {
        return $this->belongsTo(Organismo::class);
    }

    public function file()
    {
        return $this->belongsTo(File::class);
    }

    public function tipoliquidacion()
    {
        return $this->belongsTo(TipoLiquidacion::class);
    }

    public function periodo()
    {
        return $this->belongsTo(Periodo::class);
    }

    public function declaracionesjuradaslines()
    {
        return $this->hasMany(DeclaracionJuradaLine::class, 'declaracionjurada_id', 'id');
    }

    public function liquidaciones()
    {
        return $this->hasMany(Liquidacion::class, 'declaracionjurada_id', 'id');
    }

    public function scopeDdjjInfo($query)
    {
        $query->with(['organismo' => function($organismo){
            $organismo->with(['jurisdiccion' => function($jurisdiccion){
                $jurisdiccion->with('origen');
            }]);
        }, 'tipoliquidacion', 'periodo', 'file' => function ($file) {
            $file->with('user');
        }, 'declaracionesjuradaslines']);
    }


    public function scopeSearchText($query, $text){
        if ($text) {
            $query->whereHas('organismo'  ,function($organismo) use ($text){
                $organismo->where('organismo' , 'LIKE' , '%'.$text.'%');
            })->orWhere('id' , $text);
        }
    }

    public function scopeFilterOrganismo($query, $organismo_id){
        if ($organismo_id) {
            $query->whereHas('organismo'  ,function($organismo) use ($organismo_id){
                $organismo->where('id' , $organismo_id);
            });
        }
    }

    public function scopeFilterAnio($query, $anio){
        if ($anio) {
            $query->whereHas('periodo', function($periodo) use ($anio){
                $periodo->where('anio' , $anio);
            });
        }
    }

    public function scopeFilterMes($query, $mes){
        if ($mes) {
            $query->whereHas('periodo', function($periodo) use ($mes){
                $periodo->where('mes' , $mes);
            });
        }
    }
}
