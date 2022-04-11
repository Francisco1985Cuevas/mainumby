<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'personas';

    /**
     * Los atributos que se pueden asignar en masa.
     *
     * @var array
     */
    protected $fillable = ['primer_nombre', 'segundo_nombre', 'primer_apellido', 'segundo_apellido', 'ciudad_id', 'fecha_nacimiento', 'tipo_persona', 'estado_civil', 'sexo', 'foto', 'estado', 'comentario'];

    /**
     *  Obtiene la "Ciudad(ciudad_id)" que posee la Persona.
     */
    public function ciudad() {
        return $this->belongsTo(Ciudad::class);  //belongs To = pertenece a
        //si lo leemos diria algo asi: 1 Persona pertenece a 1 Ciudad
    }

    /**
     * Obtiene los Documentos para la "Persona".
     */
    public function documentos() {
        return $this->hasMany(Documento::class); // has many = tiene muchos(as)
        //si lo leemos diria algo asi: 1 Persona tiene muchos(as) Documentos
    }

    /**
     * Obtiene las Direcciones para la "Persona".
     */
    public function direcciones() {
        return $this->hasMany(Direccion::class); // has many = tiene muchos(as)
        //si lo leemos diria algo asi: 1 Persona tiene muchos(as) Direcciones
    }

    /**
     * Obtiene los Contactos para la "Persona".
     */
    public function contactos() {
        return $this->hasMany(Contacto::class); // has many = tiene muchos(as)
        //si lo leemos diria algo asi: 1 Persona tiene muchos(as) Contactos
    }

    /**
     * Obtiene los Emails para la "Persona".
     */
    public function emails() {
        return $this->hasMany(Email::class); // has many = tiene muchos(as)
        //si lo leemos diria algo asi: 1 Persona tiene muchos(as) Emails
    }

}
