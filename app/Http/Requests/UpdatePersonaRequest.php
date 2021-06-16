<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePersonaRequest extends FormRequest
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
            'nombres' => 'required|max:100',
        ];
    }

    /**
    * Mensajes de error asociados a cada campo del formulario.
    */
    public function messages(){
        return ['nombres.required' => 'El campo :attribute es obligatorio.',
                'nombres.max' => ':attribute no debe ser mayor que 100 caracteres.'
        ];
    }

    /**
    * Alias de cada atributo asociado a cada campo del formulario.
    */
    public function attributes(){
        return [
            'nombres' => 'Nombres',
        ];
    }

}
