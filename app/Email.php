<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Email extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'emails';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['persona_id', 'tipo_email_id', 'descripcion', 'comentario'];

    /**
     * Get the tipo_email that owns the Email.
     */
    public function tipoEmail() {
        return $this->belongsTo(TipoEmail::class);
    }

    /**
     * Get the persona that owns the Email.
     */
    public function persona() {
        return $this->belongsTo(Persona::class);
    }

}
