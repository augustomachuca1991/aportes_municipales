<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Agente extends Model
{
    use HasFactory, SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $fillable = [
        'cuil',
        'nombre',
        'fecha_nac',
        'sexo',
    ];



    public function liquidaciones()
    {
        return $this->belongsToMany(Liquidacion::class)->withPivot('codigo', 'fecha_ingreso', 'fecha_egreso');
    }

    public function organismos()
    {
        return $this->belongsToMany(Organismo::class);
    }
}
