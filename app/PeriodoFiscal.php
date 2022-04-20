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
     * Los atributos que se pueden asignar en masa.
     *
     * @var array
     */
    protected $fillable = ['periodo', 'descripcion', 'user_id', 'comentario'];

    /**
     *  Obtiene el "User(user_id)" que posee el Periodo Fiscal.
     */
    public function user() {
        return $this->belongsTo(User::class);  //belongs To = pertenece a
        //si lo leemos diria algo asi: 1 periodo fiscal pertenece a 1 usuario
    }

}
