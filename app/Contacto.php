<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contacto extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'contactos';

    /**
     * Los atributos que se pueden asignar en masa.
     *
     * @var array
     */
    protected $fillable = ['persona_id', 'tipo_contacto_id', 'numero_contacto', 'comentario'];


    /**
     *  Obtiene el "Tipo de Contacto(tipo_contacto_id)" que posee el Contacto.
     */
    public function tipoContacto() {
        return $this->belongsTo(TipoContacto::class);  //belongs To = pertenece a
        //si lo leemos diria algo asi: 1 Contacto pertenece a 1 tipoContacto
    }

    /**
     * Obtiene la "Persona(persona_id)" que posee el Contacto.
     */
    public function persona() {
        return $this->belongsTo(Persona::class);  //belongs To = pertenece a
        //si lo leemos diria algo asi: 1 Contacto pertenece a 1 persona
    }

}
