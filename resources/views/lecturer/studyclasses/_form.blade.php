<div class="form-group">
  {!! Form::label('id', 'ID', ['class' => 'control-label']) !!}
  {!! Form::text('id', null, ['class' => 'form-control input-lg']) !!}
  {!! error_text($errors, 'id') !!}
</div>
<div class="form-group summernote-container">
  {!! Form::label('name', 'Name', ['class' => 'control-label']) !!}
  {!! Form::text('name', null, ['id' => 'summernote', 'class' => 'form-control']) !!}
  {!! error_text($errors, 'name') !!}
</div>
<div class="form-group summernote-container">
  {!! Form::label('type', 'Type', ['class' => 'control-label']) !!}
  {!! Form::text('type', null, ['id' => 'summernote', 'class' => 'form-control']) !!}
  {!! error_text($errors, 'type') !!}
</div>
<div class="form-group summernote-container">
  {!! Form::label('description', 'Description', ['class' => 'control-label']) !!}
  {!! Form::textarea('description', null, ['id' => 'summernote', 'class' => 'form-control']) !!}
  {!! error_text($errors, 'description') !!}
</div>
<div class="form-group summernote-container">
  {!! Form::label('semester', 'Semeter', ['class' => 'control-label']) !!}
  {!! Form::text('semester', null, ['id' => 'summernote', 'class' => 'form-control']) !!}
  {!! error_text($errors, 'semester') !!}
</div>
<div class="form-group summernote-container">
  {!! Form::label('max_student', 'Max student', ['class' => 'control-label']) !!}
  {!! Form::number('max_student', null, ['id' => 'summernote', 'class' => 'form-control']) !!}
  {!! error_text($errors, 'max_student') !!}
</div>
<div class="form-group summernote-container">
  {!! Form::label('user_id', 'Lecturer', ['class' => 'control-label']) !!}
  {!! Form::select('user_id', $users, null, ['id' => 'summernote', 'class' => 'form-control']) !!}
  {!! error_text($errors, 'user_id') !!}
</div>
<div class="form-group pull-right">
  {!! Form::submit('Submit', ['class' => 'btn btn-primary']) !!}
</div>
