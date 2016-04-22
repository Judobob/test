@extends('app')
 
@section('content')
    <h2>Students</h2>
 
    @if ( !$students->count() )
        You have no students
    @else
        <ul>
            @foreach( $students as $student )
                <li><a href="{{ route('students.show', $student->slug) }}">{{ $student->name }}</a></li>
            @endforeach
        </ul>
    @endif
@endsection