<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Direccion extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'direcciones';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['persona_id', 'tipo_direccion_id', 'barrio_id', 'calle', 'numero_casa', 'piso', 'departamento', 'comentario'];


    /**
     * Get the tipo_direccion_id that owns the Direccion.
     */
    public function tipoDireccion() {
        return $this->belongsTo(TipoDireccion::class);  //belongs To = pertenece a
        //si lo leemos diria algo asi: 1 direccion pertenece a 1 tipoDireccion
    }


    /**
     * Get the barrio_id that owns the Direccion.
     */
    public function barrio() {
        return $this->belongsTo(Barrio::class);
    }

}
