<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    //
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'departamentos';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre', 'abreviatura', 'region_id'];


    /**
     * Get the pais_id that owns the Departamento.
     */
    public function region() {
        return $this->belongsTo(Region::class);  //belongs To = pertenece a
        //si lo leemos diria algo asi: 1 departamento pertenece a 1 region
    }

    public function ciudades() {
        return $this->hasMany(Ciudad::class); // has many = tiene muchos(as)
        //si lo leemos diria algo asi: 1 Departamento tiene muchos(as) ciudades
    }

}
