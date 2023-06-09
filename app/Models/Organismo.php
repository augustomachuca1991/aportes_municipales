<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Organismo extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['codigo', 'cuit','jurisdiccion_id', 'organismo'];
    protected $dates = ['deleted_at'];

    public function jurisdiccion()
    {
        return $this->belongsTo(Jurisdiccion::class);
    }


    public function conceptos()
    {
        return $this->belongsToMany(Concepto::class)->withPivot('codigo');
    }

    public function declaracionesjuradas()
    {
        return $this->hasMany(DeclaracionJurada::class);
    }


    public function files()
    {
        return $this->hasMany(File::class);
    }


    public function agentes()
    {
        return $this->belongsToMany(Agente::class);
    }
}
