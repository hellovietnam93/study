{!! Form::open(['route' => 'admin::user.upload', 'files' => true]) !!}
  <div class="form-group">
    <label for="csv-file">{{ trans('layout.upload_file') }}</label>

    <div class="form-group">
      {!! Form::label('users', trans('import.user'), ['class' => 'form-label']) !!}
      {!! Form::file('users', ['id' => 'users']) !!}
    </div>

    <div class="form-group">
      {!! Form::label('classes', trans('import.class'), ['class' => 'form-label']) !!}
      {!! Form::file('classes', ['id' => 'classes']) !!}
    </div>
  </div>
  {!! Form::submit(trans('layout.button.action.upload'), ['class' => 'btn btn-primary']) !!}
{!! Form::close() !!}
