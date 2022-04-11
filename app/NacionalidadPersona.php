<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NacionalidadPersona extends Model
{
     /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'nacionalidades_persona';

    /**
     * Los atributos que se pueden asignar en masa.
     *
     * @var array
     */
    protected $fillable = ['persona_id', 'nacionalidad_id'];


    /**
     *  Obtiene la "Persona(persona_id)" que posee la NacionalidadPersona.
     */
    public function persona() {
        return $this->belongsTo(Persona::class);
    }

    /**
     *  Obtiene la "Nacionalidad(nacionalidad_id)" que posee la NacionalidadPersona.
     */
    public function nacionalidad() {
        return $this->belongsTo(Nacionalidad::class);
    }

}
