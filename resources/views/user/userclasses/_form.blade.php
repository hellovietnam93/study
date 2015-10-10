<div class="form-group">
  {!! Form::label('key', 'Key', ['class' => 'control-label']) !!}
  {!! Form::text('key', null, ['class' => 'form-control input-lg']) !!}
  {!! error_text($errors, 'key') !!}
</div>
<div class="form-group pull-right">
  {!! Form::submit('Submit', ['class' => 'btn btn-primary']) !!}
</div>
