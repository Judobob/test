<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model {
	protected $guarded = [];
	public function student()
	    {
		return $this->hasMany('App\Student');
		return $this->belongsTo('App\Student');
    		}
}
