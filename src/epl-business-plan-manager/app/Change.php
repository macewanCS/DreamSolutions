<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Change extends Model
{
	protected $fillable = [
		'change_type',
		'description',
	];

	public function user()
	{
		return $this->belongsTo('App\User');
	}

	public function goat()
	{
		return $this->belongsTo('App\Goat');
	}

	public function getCreatedAtAttribute($date)
	{
		return new Carbon($date);
	}
}
