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
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['persona_id', 'tipo_documento_id', 'numero_documento', 'comentario'];


    /**
     * Get the tipo_documento_id that owns the Documento.
     */
    public function tipoDocumento() {
        return $this->belongsTo(TipoDocumento::class);
    }

}
