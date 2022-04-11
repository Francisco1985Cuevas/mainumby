<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Documento extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'documentos';

    /**
     * Los atributos que son asignables.
     *
     * @var array
     */
    protected $fillable = ['persona_id', 'tipo_documento_id', 'numero_documento', 'foto_documento_frente', 'foto_documento_dorso', 'fecha_emision', 'fecha_vencimiento', 'comentario'];

    /**
     *  Obtiene el "Tipo de Documento(tipo_documento_id)" que posee el Documento.
     */
    public function tipoDocumento() {
        return $this->belongsTo(TipoDocumento::class);  //belongs To = pertenece a
        //si lo leemos diria algo asi: 1 Documento pertenece a 1 tipoDocumento
    }

    /**
     * Obtiene la "Persona(persona_id)" que posee el Documento.
     */
    public function persona() {
        return $this->belongsTo(Persona::class);  //belongs To = pertenece a
        //si lo leemos diria algo asi: 1 Documento pertenece a 1 persona
    }

}
