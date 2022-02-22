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
    //public function pais() {
    //    return $this->belongsTo(Pais::class);  //belongs To = pertenece a
    //    //si lo leemos diria algo asi: 1 departamento pertenece a 1 pais
    //}

    /**
     * Get the pais_id that owns the Departamento.
     */
    public function region() {
        return $this->belongsTo(Region::class);  //belongs To = pertenece a
        //si lo leemos diria algo asi: 1 departamento pertenece a 1 region
    }

}
