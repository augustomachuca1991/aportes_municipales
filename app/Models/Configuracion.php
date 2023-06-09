<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable;

class Configuracion extends Model implements Auditable
{
    use HasFactory, SoftDeletes;
    use \OwenIt\Auditing\Auditable;

    protected $dates = ['deleted_at'];
    protected $fillable = [
        'departamento_id',
        'concepto_id',
        'user_id',
        'subtipocodigo_id',
        'tipocodigo_id'
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function departamento()
    {
        return $this->belongsTo(Departamento::class);
    }


    public function concepto()
    {
        return $this->belongsTo(Concepto::class);
    }


    public function subtipocodigo()
    {
        return $this->belongsTo(Subtipocodigo::class);
    }


    public function tipocodigo()
    {
        return $this->belongsTo(Tipocodigo::class);
    }


    public function scopeInfoConfig($query)
    {
        $query->with(['departamento', 'user', 'subtipocodigo', 'tipocodigo', 'concepto' => function ($concepto) {
            $concepto->with('organismos');
        }]);
    }
}
