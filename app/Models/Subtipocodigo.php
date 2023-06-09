<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subtipocodigo extends Model
{
    use HasFactory, SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $fillable = ['codigo', 'descripcion', 'tipocodigo_id'];


    public function tipocodigo()
    {
        return $this->belongsTo(Tipocodigo::class);
    }

    public function conceptos()
    {
        return $this->hasMany(Concepto::class);
    }

    public function configuraciones()
    {
        return $this->hasMany(Configuracion::class);
    }

}
