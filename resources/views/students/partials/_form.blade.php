<div class="form-group">
    {!! Form::label('first_name', 'First Name:') !!}
    {!! Form::text('first_name') !!}
</div>
<div class="form-group">
    {!! Form::label('last_name', 'Last Name:') !!}
    {!! Form::text('last_name') !!}
</div>
<div class="form-group">
    {!! Form::label('gender', 'Gender:') !!}
    {!! Form::text('gender') !!}
</div>
<div class="form-group">
    {!! Form::submit($submit_text, ['class'=>'btn primary']) !!}
</div>