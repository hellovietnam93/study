<div class="form-group">
  {!! Form::label('id', trans('course.field.id'), ['class' => 'control-label']) !!}
  {!! Form::text('id', null, ['class' => 'form-control input-lg']) !!}
  {!! error_text($errors, 'id') !!}
</div>
<div class="form-group summernote-container">
  {!! Form::label('name', trans('course.field.name'), ['class' => 'control-label']) !!}
  {!! Form::text('name', null, ['id' => 'summernote', 'class' => 'form-control']) !!}
  {!! error_text($errors, 'name') !!}
</div>
<div class="form-group summernote-container">
  {!! Form::label('description', trans('course.field.description'), ['class' => 'control-label']) !!}
  {!! Form::textarea('description', null, ['id' => 'summernote', 'class' => 'form-control']) !!}
  {!! error_text($errors, 'description') !!}
</div>
<div class="form-group summernote-container">
  {!! Form::label('credit', trans('course.field.credit'), ['class' => 'control-label']) !!}
  {!! Form::number('credit', null, ['id' => 'summernote', 'class' => 'form-control']) !!}
  {!! error_text($errors, 'credit') !!}
</div>
<div class="form-group summernote-container">
  {!! Form::label('credit_fee', trans('course.field.credit_fee'), ['class' => 'control-label']) !!}
  {!! Form::number('credit_fee', null, ['id' => 'summernote', 'class' => 'form-control']) !!}
  {!! error_text($errors, 'credit_fee') !!}
</div>
<div class="form-group summernote-container">
  {!! Form::label('theory_duration', trans('course.field.theory_duration'), ['class' => 'control-label']) !!}
  {!! Form::number('theory_duration', null, ['id' => 'summernote', 'class' => 'form-control']) !!}
  {!! error_text($errors, 'theory_duration') !!}
</div>
<div class="form-group summernote-container">
  {!! Form::label('exercise_duration', trans('course.field.exercise_duration'), ['class' => 'control-label']) !!}
  {!! Form::number('exercise_duration', null, ['id' => 'summernote', 'class' => 'form-control']) !!}
  {!! error_text($errors, 'exercise_duration') !!}
</div>
<div class="form-group summernote-container">
  {!! Form::label('practice_duration', trans('course.field.practice_duration'), ['class' => 'control-label']) !!}
  {!! Form::number('practice_duration', null, ['id' => 'summernote', 'class' => 'form-control']) !!}
  {!! error_text($errors, 'practice_duration') !!}
</div>
<div class="form-group summernote-container">
  {!! Form::label('weight', trans('course.field.weight'), ['class' => 'control-label']) !!}
  {!! Form::number('weight', null, ['id' => 'summernote', 'class' => 'form-control']) !!}
  {!! error_text($errors, 'weight') !!}
</div>
<div class="form-group summernote-container">
  {!! Form::label('en_name', trans('course.field.en_name'), ['class' => 'control-label']) !!}
  {!! Form::text('en_name', null, ['id' => 'summernote', 'class' => 'form-control']) !!}
  {!! error_text($errors, 'en_name') !!}
</div>
<div class="form-group summernote-container">
  {!! Form::label('abbr_name', trans('course.field.abbr_name'), ['class' => 'control-label']) !!}
  {!! Form::text('abbr_name', null, ['id' => 'summernote', 'class' => 'form-control']) !!}
  {!! error_text($errors, 'abbr_name') !!}
</div>
<div class="form-group summernote-container">
  {!! Form::label('language', trans('course.field.language'), ['class' => 'control-label']) !!}
  {!! Form::text('language', null, ['id' => 'summernote', 'class' => 'form-control']) !!}
  {!! error_text($errors, 'language') !!}
</div>
<div class="form-group summernote-container">
  {!! Form::label('evaludation', trans('course.field.evaluation'), ['class' => 'control-label']) !!}
  {!! Form::textarea('evaludation', null, ['id' => 'summernote', 'class' => 'form-control']) !!}
  {!! error_text($errors, 'evaludation') !!}
</div>
<div class="form-group pull-right">
  {!! Form::submit(trans('layout.button.action.submit'), ['class' => 'btn btn-primary']) !!}
</div>
