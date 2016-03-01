<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Goat extends Model
{
    protected $fillable = [
    	'type',
    	'parent_id',
    	'description',
    	'priority',
    	'due',
    	'budget'
    ];

    public function userLeads()
    {
    	return $this->belongsToMany('App\User', 'goat_user')->where('user_role', '=', 'L')->withTimestamps();
    }

    public function userCollaborators()
    {
    	return $this->belongsToMany('App\User', 'goat_user')->where('user_role', '=', 'C')->withTimestamps();
    }

    public function deptLeads()
    {
        return $this->belongsToMany('App\Department', 'dept_goat')->where('dept_role', '=', 'L')->withTimestamps();
    }

    public function deptCollaborators()
    {
        return $this->belongsToMany('App\Department', 'dept_goat')->where('dept_role', '=', 'C')->withTimestamps();
    }
}
