<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Email extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'emails';

    /**
     * Los atributos que se pueden asignar en masa.
     *
     * @var array
     */
    protected $fillable = ['persona_id', 'tipo_email_id', 'descripcion', 'comentario'];

    /**
     * Obtiene el "Tipo de Email(tipo_email_id)" que posee el Email.
     */
    public function tipoEmail() {
        return $this->belongsTo(TipoEmail::class);  //belongs To = pertenece a
        //si lo leemos diria algo asi: 1 Email pertenece a 1 tipoEmail
    }

    /**
     * Obtiene la "Persona(persona_id)" que posee el Email.
     */
    public function persona() {
        return $this->belongsTo(Persona::class);  //belongs To = pertenece a
        //si lo leemos diria algo asi: 1 Email pertenece a 1 Persona
    }

}
