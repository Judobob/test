@extends('app')
 
@section('content')
    <h2>Create Student</h2>
 
    {!! Form::model(new App\student, ['route' => ['students.store']]) !!}
        @include('students/partials/_form', ['submit_text' => 'Create Students'])
    {!! Form::close() !!}
@endsection
 