<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Clase extends Model
{
    use HasFactory, SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $fillable = [
        'codigo',
        'categoria_id',
        'clase'
    ];

    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }

    public function historiaslaborales()
    {
        return $this->hasMany(HistoriaLaboral::class);
    }


    public function liquidaciones()
    {
        return $this->belongsToMany(Liquidacion::class, 'historia_laborals')->withPivot('codigo', 'cargo', 'estado_id', 'funcion_id', 'fecha_inicio', 'fecha_fin');
    }
}
