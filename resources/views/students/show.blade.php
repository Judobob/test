@extends('app')
 
@section('content')
    <h2>{{ $student->first_name }}</h2>
 
    @if ( !$student->courses->count() )
        Your student has no courses.
    @else
        <ul>
            @foreach( $project->tasks as $task )
                <li><a href="{{ route('courses.students.show', [$student->slug, $course->slug]) }}">{{ $course->title }}</a></li>
            @endforeach
        </ul>
    @endif