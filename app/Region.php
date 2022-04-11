<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    //
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'regiones';

    /**
     * Los atributos que se pueden asignar en masa.
     *
     * @var array
     */
    protected $fillable = ['nombre', 'abreviatura', 'pais_id', 'descripcion'];

    /**
     *  Obtiene el "Pais(pais_id)" que posee la Region.
     */
    public function pais() {
        return $this->belongsTo(Pais::class);  //belongs To = pertenece a
        //si lo leemos diria algo asi: 1 region pertenece a 1 pais
    }

    /**
     * Obtiene los Departamentos para la "Region".
     */
    public function departamentos() {
        return $this->hasMany(Departamento::class); // has many = tiene muchos(as)
        //si lo leemos diria algo asi: 1 Region tiene muchos(as) departamentos
    }

}
