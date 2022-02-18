<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PeriodoFiscal extends Model
{
    //
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'periodos_fiscales';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['periodo', 'descripcion', 'user_id', 'comentario'];


    /**
     * Get the user_id that owns the PeriodoFiscal.
     */
    public function user() {
        return $this->belongsTo(User::class);
    }
}
