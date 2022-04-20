<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Moneda extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'monedas';

    /**
     * Los atributos que se pueden asignar en masa.
     *
     * @var array
     */
    protected $fillable = ['nombre', 'abreviatura', 'pais_id', 'comentario'];


    /**
     *  Obtiene el "Pais(pais_id)" que posee la Moneda.
     */
    public function pais() {
        return $this->belongsTo(Pais::class);
    }

}
