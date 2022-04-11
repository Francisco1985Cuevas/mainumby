<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Barrio extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'barrios';

     /**
     * Los atributos que se pueden asignar en masa.
     *
     * @var array
     */
    protected $fillable = ['nombre', 'abreviatura', 'ciudad_id'];


    /**
     *  Obtiene la "Ciudad(ciudad_id)" que posee el Barrio.
     */
    public function ciudad() {
        return $this->belongsTo(Ciudad::class);  //belongs To = pertenece a
        //si lo leemos diria algo asi: 1 barrio pertenece a 1 ciudad
    }

    /**
     * Obtiene los Direcciones para el "Barrio".
     */
    public function direcciones() {
        return $this->hasMany(Direccion::class); // has many = tiene muchos(as)
        //si lo leemos diria algo asi: 1 Barrio tiene muchos(as) direcciones
    }

}
