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
     * Los atributos que se pueden asignar en masa.
     *
     * @var array
     */
    protected $fillable = ['persona_id', 'tipo_direccion_id', 'barrio_id', 'calle_principal', 'calle_secundaria', 'numero_casa', 'edificio', 'piso', 'departamento', 'comentario'];

    /**
     * Obtiene el "Tipo de Direccion(tipo_direccion_id)" que posee la Direccion.
     */
    public function tipoDireccion() {
        return $this->belongsTo(TipoDireccion::class);  //belongs To = pertenece a
        //si lo leemos diria algo asi: 1 direccion pertenece a 1 tipoDireccion
    }

    /**
     * Obtiene el "Barrio(barrio_id)" que posee la Direccion.
     */
    public function barrio() {
        return $this->belongsTo(Barrio::class);  //belongs To = pertenece a
        //si lo leemos diria algo asi: 1 direccion pertenece a 1 barrio
    }

    /**
     * Obtiene la "Persona(persona_id)" que posee la Direccion.
     */
    public function persona() {
        return $this->belongsTo(Persona::class);  //belongs To = pertenece a
        //si lo leemos diria algo asi: 1 Direccion pertenece a 1 persona
    }

}
