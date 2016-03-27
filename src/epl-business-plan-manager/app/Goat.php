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
    	'budget',
        'bp_id',
        'complete',
        'department_id'
    ];

    public function userLeads()
    {
    	return $this->belongsToMany('App\User', 'goat_user')->where('user_role', '=', 'L')->withTimestamps();
    }

    public function userCollaborators()
    {
    	return $this->belongsToMany('App\User', 'goat_user')->where('user_role', '=', 'C')->withTimestamps();
    }

    public function department()
    {
        return $this->belongsTo('App\Department');
    }

    public function departmentCollaborators()
    {
        return $this->belongsToMany('App\Department', 'department_goat')->withTimestamps();
    }

    public function goat()
    {
        return $this->belongsTo('App\BusinessPlan');
    }

    public function users()
    {
        return $this->belongsToMany('App\User', 'goat_user');
    }
}
