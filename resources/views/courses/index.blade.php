@extends('app')
 
@section('content')
    <h2>Courses</h2>
 
    @if ( !$courses->count() )
        You have no courses
    @else
        <ul>
            @foreach( $courses as $course )
                <li><a href="{{ route('courses.show', $course->slug) }}">{{ $course->name }}</a></li>
            @endforeach
        </ul>
    @endif
@endsection