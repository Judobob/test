@extends('app')
 
@section('content')
    <h2>Students</h2>
 
    @if ( !$students->count() )
        You have no students
    @else
        <ul>
            @foreach( $students as $student )
                <li>
                    {!! Form::open(array('class' => 'form-inline', 'method' => 'DELETE', 'route' => array('students.destroy', $student->id))) !!}
                        <a href="{{ route('students.show', $student->id) }}">{{ $student->title }}</a>
                        (
                            {!! link_to_route('students.edit', 'Edit', array($student->id), array('class' => 'btn btn-info')) !!},
                            {!! Form::submit('Delete', array('class' => 'btn btn-danger')) !!}
                        )
                    {!! Form::close() !!}
                </li>
            @endforeach
        </ul>
    @endif
    <p>
	{!! link_to('students/create', 'Create Student') !!}
    </p>

@endsection