<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model {
	public function course()
    	{
		return $this->hasMany('App\Course');
		return $this->belongsTo('App\Course');
    	}
}
