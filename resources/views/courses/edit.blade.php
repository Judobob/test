@extends('app')
 
@section('content')
    <h2>Edit Course</h2>
 
    {!! Form::model($course, ['method' => 'PATCH', 'route' => ['courses.update', $course->id]]) !!}
        @include('courses/partials/_form', ['submit_text' => 'Edit Course'])
    {!! Form::close() !!}
@endsection
