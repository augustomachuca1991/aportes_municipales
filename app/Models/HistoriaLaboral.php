<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HistoriaLaboral extends Model
{
    use HasFactory, SoftDeletes;


    protected $dates = ['deleted_at'];
    protected $table = 'historia_laborals';
    protected $fillable = [
        'codigo',
        'liquidacion_id',
        'clase_id',
        'estado_id',
        'funcion_id',
        'cargo',
        'fecha_inicio',
        'fecha_fin'
    ];

    public function clase()
    {
        return $this->belongsTo(Clase::class);
    }


    public function liquidacion()
    {
        return $this->belongsTo(Liquidacion::class);
    }

    public function estado()
    {
        return $this->belongsTo(Estado::class);
    }

    public function funcion()
    {
        return $this->belongsTo(Funcion::class);
    }
}
