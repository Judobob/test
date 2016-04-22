@extends('app')
 
@section('content')
    <h2>Create Course</h2>
 
    {!! Form::model(new App\Course, ['route' => ['courses.store']]) !!}
        @include('courses/partials/_form', ['submit_text' => 'Create Courses'])
    {!! Form::close() !!}
@endsection
 