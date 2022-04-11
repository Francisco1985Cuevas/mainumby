<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ciudad extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'ciudades';

    /**
     * Los atributos que se pueden asignar en masa.
     *
     * @var array
     */
    protected $fillable = ['nombre', 'abreviatura', 'departamento_id'];

    /**
     *  Obtiene el "Departamento(departamento_id)" que posee la Ciudad.
     */
    public function departamento() {
        return $this->belongsTo(Departamento::class);  //belongs To = pertenece a
        //si lo leemos diria algo asi: 1 ciudad pertenece a 1 departamento
    }

    /**
     * Obtiene los Barrios para la "Ciudad".
     */
    public function barrios() {
        return $this->hasMany(Barrio::class); // has many = tiene muchos(as)
        //si lo leemos diria algo asi: 1 Ciudad tiene muchos(as) barrios
    }

    /**
     * Obtiene las Personas para la "Ciudad".
     */
    public function personas() {
        return $this->hasMany(Persona::class); // has many = tiene muchos(as)
        //si lo leemos diria algo asi: 1 Ciudad tiene muchos(as) Personas
    }

}
