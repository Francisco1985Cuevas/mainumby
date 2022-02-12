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
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre', 'abreviatura'];

}
