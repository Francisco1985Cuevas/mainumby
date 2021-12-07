<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePaisRequest extends FormRequest
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
            'nombre' => 'required|unique:paises|max:60',
            'abreviatura' => 'max:3',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages(){
        return ['nombre.required' => 'El campo <b>:attribute</b> es obligatorio.',
                'nombre.max' => 'El campo <b>:attribute</b> no debe ser mayor que 60 caracteres.',
                'nombre.unique' => 'Ya esta Registrado en la Base de datos el <b>:attribute</b> que Ingreso, No se pueden Repetir Registros.',
                'abreviatura.max' => 'El campo <b>:attribute</b> no debe ser mayor que 3 caracteres.'
        ];
    }

    /**
    * Alias de cada atributo asociado a cada campo del formulario.
    */
    public function attributes(){
        return [
            'nombre' => 'Nombre Pa&iacute;s',
            'abreviatura' => 'Abreviatura',
        ];
    }

}
