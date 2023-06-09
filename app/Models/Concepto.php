<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Concepto extends Model
{
    use HasFactory, SoftDeletes;


    protected $dates = ['deleted_at'];
    protected $fillable = [
        'codigo',
        'concepto',
        'unidad',
        'subtipocodigo_id'
        // 'organismo_id',
    ];


    public function liquidaciones()
    {
        return $this->belongsToMany(Liquidacion::class)->withPivot('codigo', 'importe');
    }

    public function organismos()
    {
        return $this->belongsToMany(Organismo::class)->withPivot('codigo');
    }

    public function subtipocodigo()
    {
        return $this->belongsTo(Subtipocodigo::class);
    }


    public function configuraciones()
    {
        return $this->hasMany(Configuracion::class);
    }


    public function departamentos()
    {
        return $this->belongsToMany(Departamento::class, 'configuracions', 'concepto_id', 'departamento_id');
    }


    public function scopeInfoConceptos(Builder $query)
    {
        $query->with(['liquidaciones','organismos' , 'subtipocodigo' => function($subtipo){
            $subtipo->with('tipocodigo');
        }]);
    }
}
