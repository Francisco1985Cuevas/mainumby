<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'departamentos';

    /**
     * Los atributos que se pueden asignar en masa.
     *
     * @var array
     */
    protected $fillable = ['nombre', 'abreviatura', 'region_id'];

    /**
     *  Obtiene la "Region(region_id)" que posee el Departamento.
     */
    public function region() {
        return $this->belongsTo(Region::class);  //belongs To = pertenece a
        //si lo leemos diria algo asi: 1 departamento pertenece a 1 region
    }

    /**
     * Obtiene las Ciudades para el "Departamento".
     */
    public function ciudades() {
        return $this->hasMany(Ciudad::class); // has many = tiene muchos(as)
        //si lo leemos diria algo asi: 1 Departamento tiene muchos(as) ciudades
    }

}
