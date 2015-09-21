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
  {!! Form::label('description', 'Description', ['class' => 'control-label']) !!}
  {!! Form::textarea('description', null, ['id' => 'summernote', 'class' => 'form-control']) !!}
  {!! error_text($errors, 'description') !!}
</div>
<div class="form-group summernote-container">
  {!! Form::label('credit', 'Credit', ['class' => 'control-label']) !!}
  {!! Form::number('credit', null, ['id' => 'summernote', 'class' => 'form-control']) !!}
  {!! error_text($errors, 'credit') !!}
</div>
<div class="form-group summernote-container">
  {!! Form::label('credit_fee', 'Credit fee', ['class' => 'control-label']) !!}
  {!! Form::number('credit_fee', null, ['id' => 'summernote', 'class' => 'form-control']) !!}
  {!! error_text($errors, 'credit_fee') !!}
</div>
<div class="form-group summernote-container">
  {!! Form::label('theory_duration', 'Theory duration', ['class' => 'control-label']) !!}
  {!! Form::number('theory_duration', null, ['id' => 'summernote', 'class' => 'form-control']) !!}
  {!! error_text($errors, 'theory_duration') !!}
</div>
<div class="form-group summernote-container">
  {!! Form::label('exercise_duration', 'Exercise duration', ['class' => 'control-label']) !!}
  {!! Form::number('exercise_duration', null, ['id' => 'summernote', 'class' => 'form-control']) !!}
  {!! error_text($errors, 'exercise_duration') !!}
</div>
<div class="form-group summernote-container">
  {!! Form::label('practice_duration', 'Practice duration', ['class' => 'control-label']) !!}
  {!! Form::number('practice_duration', null, ['id' => 'summernote', 'class' => 'form-control']) !!}
  {!! error_text($errors, 'practice_duration') !!}
</div>
<div class="form-group summernote-container">
  {!! Form::label('weight', 'Weight', ['class' => 'control-label']) !!}
  {!! Form::number('weight', null, ['id' => 'summernote', 'class' => 'form-control']) !!}
  {!! error_text($errors, 'weight') !!}
</div>
<div class="form-group summernote-container">
  {!! Form::label('en_name', 'English name', ['class' => 'control-label']) !!}
  {!! Form::text('en_name', null, ['id' => 'summernote', 'class' => 'form-control']) !!}
  {!! error_text($errors, 'en_name') !!}
</div>
<div class="form-group summernote-container">
  {!! Form::label('abbr_name', 'Abbr name', ['class' => 'control-label']) !!}
  {!! Form::text('abbr_name', null, ['id' => 'summernote', 'class' => 'form-control']) !!}
  {!! error_text($errors, 'abbr_name') !!}
</div>
<div class="form-group summernote-container">
  {!! Form::label('language', 'Language', ['class' => 'control-label']) !!}
  {!! Form::text('language', null, ['id' => 'summernote', 'class' => 'form-control']) !!}
  {!! error_text($errors, 'language') !!}
</div>
<div class="form-group summernote-container">
  {!! Form::label('evaluation', 'Evaluation', ['class' => 'control-label']) !!}
  {!! Form::textarea('evaluation', null, ['id' => 'summernote', 'class' => 'form-control']) !!}
  {!! error_text($errors, 'evaluation') !!}
</div>
<div class="form-group pull-right">
  {!! Form::submit('Submit', ['class' => 'btn btn-primary']) !!}
</div>
