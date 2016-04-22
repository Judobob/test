@extends('app')
 
@section('content')
    <h2>{{ $course->title }}</h2>
 
    @if ( !$course->students->count() )
        Your course has no students.
    @else
        <ul>
            @foreach( $course->students as $student )
                <li><a href="{{ route('courses.students.show', [$course->id, $student->id]) }}">{{ $student->first_name }}</a></li>
            @endforeach
        </ul>
    @endif
@endsection