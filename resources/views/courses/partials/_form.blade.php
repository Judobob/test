<div class="form-group">
    {!! Form::label('begin', 'Begin:') !!}
    {!! Form::date('begin') !!}
</div>
<div class="form-group">
    {!! Form::label('end', 'End:') !!}
    {!! Form::date('end') !!}
</div>
<div class="form-group">
    {!! Form::label('title', 'Title:') !!}
    {!! Form::text('title') !!}
</div>
<div class="form-group">
    {!! Form::label('candidate_limit', 'Limit:') !!}
    {!! Form::text('candidate_limit') !!}
</div>
<div class="form-group">
    {!! Form::submit($submit_text, ['class'=>'btn primary']) !!}
</div>