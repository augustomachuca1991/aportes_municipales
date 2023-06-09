<?php

namespace App\Http\Requests\Item;

use Illuminate\Foundation\Http\FormRequest;

class AddRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        
        return [
            'item.nombre' => 'required|max:80',
            'item.cuil.first' => 'required|integer|digits:2',
            'item.cuil.middle' => 'required|integer|digits:8',
            'item.cuil.last' => 'required|integer|digits:1',
            'item.nac' => 'required|date',
            'item.estadoCivil' => 'required',
            'item.sexo' => 'required',
            'item.fechaIngreso' => 'required|date',
            'item.fechaEgreso' => 'nullable|date',
            'item.cargo' => 'required|max:80',
            'item.situacion' => 'required',
            'item.estado' => 'required',
            'item.basico'=> "nullable|numeric",
            'item.antiguedad'=> "nullable|numeric",
            'item.titulo'=> "nullable|numeric",
            'item.presentismo'=> "nullable|numeric",
            'item.adicional'=> "nullable|numeric",
            'item.resolucion'=> "nullable|numeric",
            'item.minGarantizado'=> "nullable|numeric",
            'item.noRemunerativo'=> "nullable|numeric",
            'item.plus'=> "nullable|numeric",
            'item.dedicacionFuncional'=> "nullable|numeric",
            'item.prolongacionDeJornada'=> "nullable|numeric",
            'item.productividad'=> "nullable|numeric",

        ];
    }
}
