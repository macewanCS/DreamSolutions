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
        'department_id',
        'success_measure'
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

    public function changes()
    {
        return $this->hasMany('App\Change');
    }

    public function goat()
    {
        return $this->belongsTo('App\BusinessPlan');
    }

    public function goat_level()
    {
        switch ($this->type) {
            case 'G':
                return 1;
            case 'O':
                return 2;
            case 'A':
                return 3;
            case 'T':
                return 4;
            default:
                return 0;
        }
    }

    public function parent()
    {
        return $this->belongsTo('App\Goat', 'parent_id', 'id');
    }

    public function get_parent($level)
    {
        $goat = $this;
        while ($goat->goat_level() > $level)
            $goat = $goat->parent;

        return $goat;
    }

}
