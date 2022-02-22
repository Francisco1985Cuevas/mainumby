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
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre', 'abreviatura'];


    //public function departamentos() {
    //    return $this->hasMany(Departamento::class); // has many = tiene muchos(as)
    //    //si lo leemos diria algo asi: 1 Pais tiene muchos(as) departamentos
    //}

    public function regiones() {
        return $this->hasMany(Region::class); // has many = tiene muchos(as)
        //si lo leemos diria algo asi: 1 Pais tiene muchos(as) regiones
    }

}
