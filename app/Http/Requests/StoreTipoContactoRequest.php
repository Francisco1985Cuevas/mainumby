<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTipoContactoRequest extends FormRequest
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
            'nombre' => 'required|unique:tipos_contactos|max:60',
            'abreviatura' => 'max:3',
        ];
    }

    /**
    * Mensajes de error asociados a cada campo del formulario.
    */
    public function messages(){
        return ['nombre.required' => 'El campo :attribute es obligatorio.',
                'nombre.max' => ':attribute no debe ser mayor que 60 caracteres.',
                'nombre.unique' => 'Ya esta Registrado en la Base de datos el :attribute que Ingreso, No se pueden Repetir Registros.',
                'abreviatura.max' => 'El campo :attribute no debe ser mayor que 3 caracteres.'
        ];
    }

    /**
    * Alias de cada atributo asociado a cada campo del formulario.
    */
    public function attributes(){
        return [
            'nombre' => 'Nombre',
            'abreviatura' => 'Abreviatura',
        ];
    }

}
