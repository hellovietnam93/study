<div class="form-group">
  {!! Form::label('id', trans('semester.field.id'), ['class' => 'control-label']) !!}
  {!! Form::text('id', null, ['class' => 'form-control input-lg']) !!}
  {!! error_text($errors, 'id') !!}
</div>
<div class="form-group pull-right">
  {!! Form::submit(trans('layout.button.action.submit'), ['class' => 'btn btn-primary']) !!}
</div>
