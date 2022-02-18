<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    //
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'proveedores';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id', 'persona_id'];


    /**
     * Get the user_id that owns the Proveedor.
     */
    public function user() {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the persona_id that owns the Proveedor.
     */
    public function persona() {
        return $this->belongsTo(Persona::class);
    }

}
