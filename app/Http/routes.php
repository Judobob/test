<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

get ('users', function(){
  return App\User::all();
});

// Provide controller methods with object instead of ID
Route::model('courses', 'Course');
Route::model('students', 'Student');

Route::post('courses/{courses}/register','CoursesController@register' );
Route::delete('courses/{courses}/register','CoursesController@unregister' );

Route::resource('courses', 'CoursesController');
Route::resource('students', 'StudentsController');

Route::bind('courses', function($value, $route) {
	return App\Course::whereId($value)->first();
});
Route::bind('students', function($value, $route) {
	return App\Student::whereId($value)->first();
});