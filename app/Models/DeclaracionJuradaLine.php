<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DeclaracionJuradaLine extends Model
{
    use HasFactory, SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $fillable = [
        'declaracionjurada_id',
        'nombre',
        'cuil',
        'fecha_nac',
        'sexo',
        'cod_estado_civil',
        'puesto_laboral',
        'cargo',
        'fecha_ingreso',
        'fecha_egreso',
        'nl_desde_nro',
        'nl_hasta_nro',
        'nl_desde_anio',
        'nl_hasta_anio',
        'nl_desde_otro',
        'nl_hasta_otro',
        'cod_categoria',
        'categoria',
        'cod_clase',
        'clase',
        'cod_estado',
        'cod_organismo',
        'cuit_organismo',
        'detalle'
    ];

    public function declaracionjurada()
    {
        return $this->belongsTo(DeclaracionJurada::class);
    }
}
