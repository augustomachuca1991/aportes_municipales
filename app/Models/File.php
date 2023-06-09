<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class File extends Model
{
    use HasFactory, SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $fillable = [
        'user_id',
        'path',
        'name',
        'periodo_id',
        'tipoliquidacion_id',
        'organismo_id',
        'secuencia',
        'status',
        'apply',
        'rectificar',
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }



    public function tipoliquidacion()
    {
        return $this->belongsTo(TipoLiquidacion::class);
    }



    public function periodo()
    {
        return $this->belongsTo(Periodo::class);
    }



    public function organismo()
    {
        return $this->belongsTo(Organismo::class);
    }



    public function declaracionesjuradas()
    {
        return $this->hasMany(DeclaracionJurada::class);
    }



    public function scopeGetFileOfUser($query, $user_id)
    {
        if (!empty($user_id)) {
            $query->whereHas('user', function ($user) use ($user_id) {
                $user->where('id', $user_id);
            });
        }
    }


    public function scopeInfoFile($query)
    {
        $query->with('user' ,'tipoliquidacion' , 'periodo' , 'organismo');
    }



    public function scopeFilterText(Builder $query , $text)
    {
        if($text){
            $query->where('name' , 'LIKE' , '%'.$text.'%');
        }
    }


    public function scopeFilterPeriodo(Builder $query , $cod_periodo)
    {
        if($cod_periodo){
            $query->whereHas('periodo' , function($periodo) use ($cod_periodo){
                $periodo->where('codigo' , $cod_periodo);
            });
        }
    }


    public function scopeFilterTipo(Builder $query, $tipo_id)
    {
        if($tipo_id){
            $query->whereHas('tipoliquidacion' , function($tipoliquidacion) use ($tipo_id){
                $tipoliquidacion->where('codigo' , $tipo_id);
            });
        }
    }
}
