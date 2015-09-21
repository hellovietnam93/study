{!! Form::open(array('method' => 'DELETE', 'route' => array('lecturer::course.destroy', $course))) !!}
  <button type="submit" class="btn btn-danger btn-circle btn-sm"
    data-toggle="tooltip" data-placement="bottom" title="Send to trash">
    <i class="fa fa-times"></i>
  </button>
{!! Form::close() !!}
