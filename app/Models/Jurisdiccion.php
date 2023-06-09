<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Jurisdiccion extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['codigo', 'origen_id', 'jurisdiccion'];
    protected $dates = ['deleted_at'];

    public function origen()
    {
        return $this->belongsTo(Origen::class);
    }

    public function organismos()
    {
        return $this->hasMany(Organismo::class);
    }


    public function categorias()
    {
        return $this->belongsToMany(Categoria::class);
    }

    public function scopeAutocompleteJurisdiccion($query, $search)
    {
        if (!empty($search)) {
            $query->where('jurisdiccion', 'LIKE', "%" . $search . "%")->orWhere('codigo', 'LIKE', "%" . $search . "%");
        }
    }


    public function scopeFilterForOrigen($query, $origen_id)
    {
        if (!empty($origen_id)) {

            $query->whereHas('origen' , function($origen) use ($origen_id){
                $origen->where('id' , $origen_id);
            });
        }
    }

    public function scopeFilterForJurisdiccion($query, $jurisdiccion_id)
    {
        if (!empty($jurisdiccion_id)) {

            $query->where('id' , $jurisdiccion_id);
        }
    }



}
