p<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $fillable = [
    	'name',
    	'isTeam'
    ];

    public function users()
    {
    	return $this->belongsToMany('App\User');
    }
}
