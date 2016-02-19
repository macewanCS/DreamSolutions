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

    public function leads() 
    {
    	return $this->belongsToMany('App\User', 'goat_lead')->withTimestamps();
    }

    public function collaborators()
    {
    	return $this->belongsToMany('App\User', 'collaborator_goat')->withTimestamps();
    }
}
