<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model {
	protected $guarded = [];
	public function courses(){
		return $this->belongsToMany('App\Courses');
	}
}
