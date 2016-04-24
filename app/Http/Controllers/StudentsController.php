<?php namespace App\Http\Controllers;
use Input;
use Redirect;
use App\Student;
use Validator;
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
	public function store(Request $request)
	{
	 $validator = Validator::make($request->all(), [
            'gender' => 'required',
	    'first_name' => 'required',
	    'last_name' => 'required'
        ]);
	if ($validator->fails()) {
                return jsend()->success()
                      ->code(400)
                      ->message("Error")
                      ->data(['message' => 'Fields gender first name last name required'])
                      ->get();
		
        }
	$input = Input::all();
	$course = Student::create( $input );
 	
		return jsend()->success()
                      ->code(200)
                      ->message("success")
                      ->data(['message' => 'success'])
                      ->get();
		 

	
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
	$input = array_except(Input::all(), '_method');
	$student->update($input);
	return jsend()->success()
                      ->code(200)
                      ->message("success")
                      ->data([])
                      ->get();

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
