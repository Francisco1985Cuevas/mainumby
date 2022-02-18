<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NacionalidadPersona extends Model
{
    //
     /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'nacionalidades_persona';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['persona_id', 'nacionalidad_id'];


    /**
     * Get the persona_id that owns the NacionalidadPersona.
     */
    public function persona() {
        return $this->belongsTo(Persona::class);
    }

    /**
     * Get the nacionalidad_id that owns the NacionalidadPersona.
     */
    public function nacionalidad() {
        return $this->belongsTo(Nacionalidad::class);
    }

}
