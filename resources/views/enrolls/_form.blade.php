<div class="form-group">
  {!! Form::label('key', trans('studyclass.field.key'), ['class' => 'control-label']) !!}
  {!! Form::password('key', null, ['class' => 'form-control input-lg']) !!}
  {!! error_text($errors, 'key') !!}
</div>
<div class="form-group pull-right">
  {!! Form::submit(trans('layout.button.action.submit'), ['class' => 'btn btn-primary']) !!}
</div>
