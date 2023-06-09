<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Origen extends Model
{
    use HasFactory, SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $fillable = ['codigo', 'origen'];

    public function jurisdicciones()
    {
        return $this->hasMany(Jurisdiccion::class);
    }


    public function scopeInfoOrigenes(Builder $query){
        $query->with(['jurisdicciones' => function($jurisdicciones){
            $jurisdicciones->with(['organismos' => function($organismos){
                $organismos->with('agentes');
            }]);
        }]);
    }


    public function ScopeFilterOrganismo(Builder $query, $text){
        if ($text) {
            $query
            ->whereHas('jurisdicciones' , function($jurisdicciones) use ($text){
                $jurisdicciones->whereHas('organismos' , function($organismos) use ($text){
                    $organismos->where('organismo' , 'LIKE' , '%'.$text.'%');
                })->orWhere('jurisdiccion' , 'LIKE' , '%'.$text.'%');
            })->orWhere('origen' , 'LIKE' , '%'.$text.'%');
        }
    }


}
