{!! Form::open(['route' => 'lecturer::course.upload', 'files' => true]) !!}
  <div class="form-group">
    <label for="csv-file">Upload CSV File</label>
    {!! Form::file('csv-file', ['id' => 'csv-file']) !!}
  </div>
  {!! Form::submit('Upload', ['class' => 'btn btn-primary']) !!}
{!! Form::close() !!}
