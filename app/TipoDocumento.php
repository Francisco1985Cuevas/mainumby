<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoDocumento extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'tipos_documentos';

    /**
     * Los atributos que se pueden asignar en masa.
     *
     * @var array
     */
    protected $fillable = ['nombre', 'abreviatura', 'comentario'];

    /**
     * Obtiene los Documentos para el "Tipo de Documento".
     */
    public function documentos() {
        return $this->hasMany(Documento::class); // has many = tiene muchos(as)
        //si lo leemos diria algo asi: 1 TipoDocumento tiene muchos(as) Documentos
    }

}
