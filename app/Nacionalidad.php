<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nacionalidad extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'nacionalidades';

    /**
     * Los atributos que se pueden asignar en masa.
     *
     * @var array
     */
    protected $fillable = ['nombre', 'abreviatura', 'pais_id', 'comentario'];


    /**
     *  Obtiene el "Pais(pais_id)" que posee la Nacionalidad.
     */
    public function pais() {
        return $this->belongsTo(Pais::class);
    }
}
