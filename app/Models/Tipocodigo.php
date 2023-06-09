<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tipocodigo extends Model
{
    use HasFactory, SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $fillable = [
        'codigo', 'descripcion'
    ];


    public function subtipocodigos()
    {
        return $this->hasMany(Subtipocodigo::class);
    }

    public function configuraciones()
    {
        return $this->hasMany(Configuracion::class);
    }

    public function scopeSearch($query, $search)
    {
        if (!empty($search)) {
            $query
                ->whereHas('subtipocodigos', function ($subtipocodigos) use ($search) {
                    $subtipocodigos
                        ->where('descripcion', 'LIKE', "%" . $search . "%")
                        ->orWhere('codigo', 'LIKE', "%" . $search . "%");
                })
                ->orWhere('descripcion', 'LIKE', "%" . $search . "%")
                ->orWhere('codigo', 'LIKE', "%" . $search . "%");
        }
    }
}
