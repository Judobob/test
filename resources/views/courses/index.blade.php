@extends('app')
 
@section('content')
    <h2>Courses</h2>
 
    @if ( !$courses->count() )
        You have no courses
    @else
        <ul>
            @foreach( $courses as $course )
                <li>
                    {!! Form::open(array('class' => 'form-inline', 'method' => 'DELETE', 'route' => array('courses.destroy', $course->slug))) !!}
                        <a href="{{ route('courses.show', $course->slug) }}">{{ $course->title }}</a>
                        (
                            {!! link_to_route('courses.edit', 'Edit', array($course->id), array('class' => 'btn btn-info')) !!},
                            {!! Form::submit('Delete', array('class' => 'btn btn-danger')) !!}
                        )
                    {!! Form::close() !!}
                </li>            @endforeach
        </ul>
    @endif
    <p>
	{!! link_to('courses/create', 'Create Course') !!}
    </p>
@endsection