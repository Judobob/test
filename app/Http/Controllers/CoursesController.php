<?php namespace App\Http\Controllers;
use Input;
use Redirect;
use Validator;
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
		$returnArray=Array();
		$returnArray['courses']=Array();
		foreach ($courses as $course) {

		$course->students->all();
		   $returnArray['courses'][]=$course; 
		}


		
		 return jsend()->success()
                      ->code(200)
                      ->message("Success")
                      ->data((array)$returnArray)
                      ->get();
		 

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
	 * @param Request
	 * @return Response
	 */
	public function store(Request $request)
	{
	 $validator = Validator::make($request->all(), [
            'begin' => 'required',
	    'end' => 'required',
	    'candidate_limit' => 'required'
        ]);
	if ($validator->fails()) {
                return jsend()->success()
                      ->code(400)
                      ->message("Error")
                      ->data(['message' => 'Fields begin, end and title are required'])
                      ->get();
		
        }
	$input = Input::all();
	$course = Course::create( $input );
 	
		return jsend()->success()
                      ->code(200)
                      ->message("success")
                      ->data(['message' => 'success'])
                      ->get();
		 

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
		$students=$course->students->count();
		$candidate_limit=$course->candidate_limit;
		if($students > $candidate_limit){
		return jsend()->success('false')
                      ->data(['message' => 'Candidate Limit reached','candidate_limit' =>$candidate_limit])
                      ->get();
				
		}		
		$student_id = Input::get('student_id');
		$course->students()->attach($student_id);
		return jsend()->success()
                      ->data([])
                      ->get();
				
		}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function unregister(Course $course){
		$student_id = Input::get('student_id');
		
		if ($course->students()->exists($student_id)==false){
		return jsend()->error()
		      ->code(404)
                      ->data([])
                      ->get();

		}
	
		$course->students()->detach($student_id);
		return jsend()->error()
		      ->code(200)
                      ->data(['message' => 'Candidate Limit reached','candidate_limit' =>$candidate_limit])
                      ->get();

	}


}
