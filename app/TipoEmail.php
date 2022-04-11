<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoEmail extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'tipos_emails';

    /**
     * Los atributos que se pueden asignar en masa.
     *
     * @var array
     */
    protected $fillable = ['nombre', 'abreviatura', 'comentario'];

    /**
     * Obtener los Emails para el "Tipo de Email".
     */
    public function emails() {
        return $this->hasMany(Email::class); // has many = tiene muchos(as)
        //si lo leemos diria algo asi: 1 TipoEmail tiene muchos(as) Emails
    }

}
