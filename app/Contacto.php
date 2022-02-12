<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contacto extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'contactos';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['persona_id', 'tipo_contacto_id', 'numero_contacto', 'comentario'];


    /**
     * Get the tipo_contacto_id that owns the Contacto.
     */
    public function tipoContacto() {
        return $this->belongsTo(TipoContacto::class);
    }

}
