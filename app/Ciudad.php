<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ciudad extends Model
{
    //
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'ciudades';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre', 'abreviatura', 'departamento_id'];

    /**
     * Get the departamento_id that owns the Ciudad.
     */
    public function departamento() {
        return $this->belongsTo(Departamento::class);
    }
}
