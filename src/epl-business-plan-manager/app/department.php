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
        return $this->belongsToMany('App\Goat', 'dept_role')->where('dept_role', '=', 'L')->withTimestamps();
    }

    public function collaboratorOn()
    {
        return $this->belongsToMany('App\Goat', 'dept_role')->where('dept_role', '=', 'C')->withTimestamps();
    }

    public function users()
    {
    	return $this->belongsToMany('App\User');
    }
}
