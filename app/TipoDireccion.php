<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoDireccion extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'tipos_direcciones';

    /**
     * Los atributos que se pueden asignar en masa.
     *
     * @var array
     */
    protected $fillable = ['nombre', 'abreviatura', 'comentario'];

    /**
     * Obtiene las Direcciones para el "Tipo de Direccion".
     */
    public function direcciones() {
        return $this->hasMany(Direccion::class); // has many = tiene muchos(as)
        //si lo leemos diria algo asi: 1 TipoDireccion tiene muchos(as) direcciones
    }

}
