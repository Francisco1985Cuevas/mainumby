<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Moneda extends Model
{
    //
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'monedas';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre', 'abreviatura', 'pais_id', 'comentario'];


    /**
     * Get the pais_id that owns the Moneda.
     */
    public function pais() {
        return $this->belongsTo(Pais::class);
    }

}
