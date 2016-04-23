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
    <div class="form-group">
    {!! Form::label('Student list') !!}<br />
    {!! Form::select('student_id', ($student_list), null, ['class' => 'form-control']) !!}
    </div>
@endsection