<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $fillable = [
    	'name',
    	'isTeam'
    ];

    public function leadOn()
    {
        return $this->hasMany('App\Goat');
    }

    public function collaboratorOn()
    {
        return $this->belongsToMany('App\Goat');
    }

    public function users()
    {
    	return $this->belongsToMany('App\User');
    }

    public function leads()
    {
        return $this->users()->where('permission_level', 'T');
    }
}
