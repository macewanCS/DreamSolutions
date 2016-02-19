<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'email', 'password',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function leadOn()
    {
        return $this->belongsToMany('App\Goat', 'goat_lead')->withTimestamps();
    }

    public function collaboratorOn()
    {
        return $this->belongsToMany('App\Goat', 'collaborator_goat')->withTimestamps();
    }

    // To access the permission_level as it is... something like
    //    $user->departments()->where('name', 'IT')->first()->pivot->permission_level
    // There's gotta be an easier way than this!
    public function departments()
    {
        return $this->belongsToMany('App\Department')->withPivot('permission_level')->withTimestamps();
    }
}
