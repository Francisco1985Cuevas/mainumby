<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RolUser extends Model
{
    //
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'roles_users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id', 'rol_id'];


    /**
     * Get the user_id that owns the RolUser.
     */
    public function user() {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the rol_id that owns the RolUser.
     */
    public function rol() {
        return $this->belongsTo(Rol::class);
    }

}
