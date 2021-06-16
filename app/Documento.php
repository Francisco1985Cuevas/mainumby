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
    protected $fillable = ['persona', 'tipo_documento', 'numero_documento'];
}
