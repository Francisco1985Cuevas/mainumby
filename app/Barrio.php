<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Barrio extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'barrios';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre', 'abreviatura', 'ciudad'];
}
