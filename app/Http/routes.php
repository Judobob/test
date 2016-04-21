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

Route::resource('courses', 'CoursesController');
Route::resource('students', 'StudentsController');

Route::bind('courses', function($value, $route) {
	return App\Task::whereSlug($value)->first();
});
Route::bind('students', function($value, $route) {
	return App\Project::whereSlug($value)->first();
});