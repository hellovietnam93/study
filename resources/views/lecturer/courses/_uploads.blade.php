{!! Form::open(['route' => 'lecturer::course.upload', 'files' => true]) !!}
  <div class="form-group">
    <label for="csv-file">{{ trans('layout.upload_file') }}</label>
    {!! Form::file('csv-file', ['id' => 'csv-file']) !!}
  </div>
  {!! Form::submit(trans('layout.button.action.upload'), ['class' => 'btn btn-primary']) !!}
{!! Form::close() !!}
