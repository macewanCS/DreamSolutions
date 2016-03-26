<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Change extends Model
{
	protected $fillable = [
		'goat_id',
		'user_id',
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
