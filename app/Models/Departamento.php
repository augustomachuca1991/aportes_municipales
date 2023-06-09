<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Departamento extends Model
{
    use HasFactory, SoftDeletes;

    
    protected $dates = ['deleted_at'];
    protected $fillable = [
        'codigo',
        'departemento'
    ];


    public function configuraciones()
    {
        return $this->hasMany(Configuracion::class);
    }


    public function conceptos()
    {
        return $this->belongsToMany(Concepto::class  ,'configuracions' ,'departamento_id' , 'concepto_id');
    }


}
