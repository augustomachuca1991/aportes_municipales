<?php

namespace App\Http\Requests\File;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'file' => ['required','file','mimes:csv,txt,xlsx'],
            'name' => ['same:old_name'],
            'periodo_id' => ['exists:periodos,codigo'],
            'tipo_id' => ['exists:tipo_liquidacions,codigo'],
            'organismo_id' => ['exists:organismos,cuit'],
        ];
    }
}
