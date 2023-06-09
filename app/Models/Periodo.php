<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Periodo extends Model
{
    use HasFactory, SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $fillable = [
        'codigo', 'periodo', 'mes', 'periodo_milisegundos', 'anio',
    ];


    public function declaracionesjuradas()
    {
        return $this->hasMany(DeclaracionJurada::class);
    }

    public function files()
    {
        return $this->hasMany(File::class);
    }
}
