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
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre', 'abreviatura'];

}
