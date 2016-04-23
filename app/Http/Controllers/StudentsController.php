<?php namespace App\Http\Controllers;
use Input;
use Redirect;
use App\Student;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class StudentsController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$students= Student::all();
		return view('students.index',compact('students'));

	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('students.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show(Student $student)
	{
		$course_list= \DB::table('courses')->lists('title', 'id');

		return view('students.show', compact('student','course_list'));

	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit(Student $student)
	{
		return view('students.edit', compact('student'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Student $student)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy(Student $student)
	{
		//
	}

}
