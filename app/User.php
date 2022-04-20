<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * Los atributos que se pueden asignar en masa.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'persona_id',
    ];

    /**
     * Los atributos que deben ocultarse para los arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Los atributos que se deben convertir a los tipos nativos.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     *  Obtiene la "Persona(persona_id)" que posee el Usuario.
     */
    public function persona() {
        return $this->belongsTo(Persona::class);  //belongs To = pertenece a
        //si lo leemos diria algo asi: 1 Usuario pertenece a 1 Persona
    }

    /**
     * Obtiene los Periodos Fiscales para el "Usuario".
     */
    public function periodosFiscales() {
        return $this->hasMany(PeriodoFiscal::class); // has many = tiene muchos(as)
        //si lo leemos diria algo asi: 1 Usuario tiene muchos(as) periodos fiscales
    }

}
