<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoContacto extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'tipos_contactos';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre', 'abreviatura', 'comentario'];


    public function contactos() {
        return $this->hasMany(Contacto::class); // has many = tiene muchos(as)
        //si lo leemos diria algo asi: 1 TipoContacto tiene muchos(as) Contactos
    }

}
