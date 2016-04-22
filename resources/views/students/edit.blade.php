@extends('app')
 
@section('content')
    <h2>Edit Student</h2>
 
    {!! Form::model($student, ['method' => 'PATCH', 'route' => ['students.update', $student->slug]]) !!}
        @include('students/partials/_form', ['submit_text' => 'Edit Student'])
    {!! Form::close() !!}
@endsection
