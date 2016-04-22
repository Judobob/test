<?php namespace App\Http\Controllers;
use Input;
use Redirect;
use App\Course;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class CoursesController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$courses= Course::all();
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
	Course::create( $input );
 
	return Redirect::route('courses.index')->with('message', 'Project created');

	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show(Course $course)
	{
		return view('courses.show', compact('course'));
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

}
