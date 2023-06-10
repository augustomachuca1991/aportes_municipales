<?php

namespace App\Http\Requests\Item;

use Illuminate\Foundation\Http\FormRequest;

class AddRequest extends FormRequest
{

    /**
     * Get the renamed validation attributes.
     *
     * @return array
     */
    // public function attributes()
    // {
    //     return [
    //         'item.nombre' => 'nombre',
    //         'item.cuil.first' => 'first',
    //         'item.cuil.middle' => 'middle',
    //         'item.cuil.last' => 'last',
    //         'item.nac' => 'nac',
    //         'item.estadoCivil' => 'estadoCivil',
    //         'item.sexo' => 'sexo',
    //         'item.fechaIngreso' => 'fechaIngreso',
    //         'item.fechaEgreso' => 'fechaEgreso',
    //         'item.cargo' => 'cargo',
    //         'item.situacion' => 'situacion',
    //         'item.estado' => 'estado',
    //         'item.basico' => 'basico',
    //         'item.antiguedad' => 'antiguedad',
    //         'item.titulo' => 'titulo',
    //         'item.presentismo' => 'presentismo',
    //         'item.adicional' => 'adicional',
    //         'item.resolucion' => 'resolucion',
    //         'item.minGarantizado' => 'minGarantizado',
    //         'item.noRemunerativo' => 'noRemunerativo',
    //         'item.plus' => 'plus',
    //         'item.dedicacionFuncional' => 'dedicacionFuncional',
    //         'item.prolongacionDeJornada' => 'prolongacionDeJornada',
    //         'item.productividad' => 'productividad',
    //     ];
    // }
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
            'item.basico' => "nullable|numeric",
            'item.antiguedad' => "nullable|numeric",
            'item.titulo' => "nullable|numeric",
            'item.presentismo' => "nullable|numeric",
            'item.adicional' => "nullable|numeric",
            'item.resolucion' => "nullable|numeric",
            'item.minGarantizado' => "nullable|numeric",
            'item.noRemunerativo' => "nullable|numeric",
            'item.plus' => "nullable|numeric",
            'item.dedicacionFuncional' => "nullable|numeric",
            'item.prolongacionDeJornada' => "nullable|numeric",
            'item.productividad' => "nullable|numeric",

        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'item.nombre.required' => 'El campo nombre es obligatorio.',
            'item.nombre.max' => 'El campo nombre no debe superar los 80 caracteres.',
            'item.cuil.first.required' => 'El campo first es obligatorio.',
            'item.cuil.first.integer' => 'El campo first debe ser un número entero.',
            'item.cuil.first.digits' => 'El campo first debe tener :digits dígitos.',
            'item.cuil.middle.required' => 'El campo middle es obligatorio.',
            'item.cuil.middle.integer' => 'El campo middle debe ser un número entero.',
            'item.cuil.middle.digits' => 'El campo middle debe tener :digits dígitos.',
            'item.cuil.last.required' => 'El campo last es obligatorio.',
            'item.cuil.last.integer' => 'El campo last debe ser un número entero.',
            'item.cuil.last.digits' => 'El campo last debe tener :digits dígitos.',
            'item.nac.required' => 'El campo fecha de nacimiento es obligatorio.',
            'item.nac.date' => 'El campo fecha de nacimiento debe ser una fecha válida.',
            'item.estadoCivil.required' => 'El campo estado civil es obligatorio.',
            'item.sexo.required' => 'El campo sexo es obligatorio.',
            'item.fechaIngreso.required' => 'El campo fecha de ingreso es obligatorio.',
            'item.fechaIngreso.date' => 'El campo fecha de ingreso debe ser una fecha válida.',
            'item.fechaEgreso.date' => 'El campo fecha de egreso debe ser una fecha válida.',
            'item.cargo.required' => 'El campo cargo es obligatorio.',
            'item.cargo.max' => 'El campo cargo no debe superar los 80 caracteres.',
            'item.situacion.required' => 'El campo situacion es obligatorio.',
            'item.estado.required' => 'El campo estado es obligatorio.',
            'item.basico.numeric' => 'El campo basico debe ser un valor numérico.',
            'item.antiguedad.numeric' => 'El campo antiguedad debe ser un valor numérico.',
            'item.titulo.numeric' => 'El campo titulo debe ser un valor numérico.',
            'item.presentismo.numeric' => 'El campo presentismo debe ser un valor numérico.',
            'item.adicional.numeric' => 'El campo adicional debe ser un valor numérico.',
            'item.resolucion.numeric' => 'El campo resolucion debe ser un valor numérico.',
            'item.minGarantizado.numeric' => 'El campo minimo garantizado debe ser un valor numérico.',
            'item.noRemunerativo.numeric' => 'El campo no remunerativo debe ser un valor numérico.',
            'item.plus.numeric' => 'El campo plus debe ser un valor numérico.',
            'item.dedicacionFuncional.numeric' => 'El campo dedicación funcional debe ser un valor numérico.',
            'item.prolongacionDeJornada.numeric' => 'El campo prolongación de jornada debe ser un valor numérico.',
            'item.productividad.numeric' => 'El campo productividad debe ser un valor numérico.',
        ];
    }
}
