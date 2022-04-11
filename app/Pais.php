<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pais extends Model
{
     /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'paises';

    /**
     * Los atributos que se pueden asignar en masa.
     *
     * @var array
     */
    protected $fillable = ['nombre', 'abreviatura'];

    /**
     * Obtiene las Regiones para el "Pais".
     */
    public function regiones() {
        return $this->hasMany(Region::class); // has many = tiene muchos(as)
        //si lo leemos diria algo asi: 1 Pais tiene muchos(as) regiones
    }

    /**
     * Obtiene las Nacionalidades para el "Pais".
     */
    public function nacionalidades() {
        return $this->hasMany(Nacionalidad::class); // has many = tiene muchos(as)
        //si lo leemos diria algo asi: 1 Pais tiene muchos(as) nacionalidades
    }

}
