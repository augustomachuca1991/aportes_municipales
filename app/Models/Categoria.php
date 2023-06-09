<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Categoria extends Model
{
    use HasFactory, SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $fillable = ['codigo', 'categoria'];

    public function clases()
    {
        return $this->hasMany(Clase::class);
    }

    public function jurisdicciones()
    {
        return $this->belongsToMany(Jurisdiccion::class);
    }


    public function scopeInfoCategorias($query){

        $query->with(['jurisdicciones', 'clases']);
    }


    public function scopeFilterText($query, $text)
    {
        if ($text){
            $query->where('categoria' , 'LIKE' , '%'.$text.'%')
            ->orWhere('codigo' , 'LIKE' , '%'.$text.'%');
        }
    }
}
