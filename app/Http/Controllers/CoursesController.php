<?php namespace App\Http\Controllers;
use Input;
use Redirect;
use App\Course;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Request;

class CoursesController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$courses= Course::all();
		if(Request::isJson()){
		 return jsend()->success()
                      ->code(200)
                      ->message("Success")
                      ->data(['allGood' => true])
                      ->get();
		} 

		return view('courses.index',compact('courses'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('courses.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
	$input = Input::all();
	$course = Course::create( $input );
 	if(Request::isJson()){
		return jsend()->success()
                      ->code(200)
                      ->message("Success")
                      ->data(['allGood' => true])
                      ->get();
		} 

	return Redirect::route('courses.index')->with('message', 'Course created');

	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show(Course $course)
	{
		$student_list= \DB::table('students')->lists('first_name', 'id');
		return view('courses.show', compact('course','student_list'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit(Course $course)
	{
		return view('courses.edit', compact('course'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Course $course)
	{
	$input = array_except(Input::all(), '_method');
	$course->update($input);
 
	return Redirect::route('courses.show', $course->slug)->with('message', 'Project updated.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy(Course $course)
	{
	$course->delete();
 
	return Redirect::route('courses.index')->with('message', 'Course deleted.');	}
	

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function register(Course $course){
		$student_id = Input::get('student_id');
		$course->students()->attach($student_id);
		return $student_id;
	}

}
