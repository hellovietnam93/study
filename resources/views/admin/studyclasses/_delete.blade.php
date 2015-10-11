{!! Form::open(array('method' => 'DELETE', 'route' => array('admin::class.destroy', $course, $class))) !!}
  <button type="submit" class="btn btn-danger btn-circle btn-sm"
    data-toggle="tooltip" data-placement="bottom" title="Send to trash">
    <i class="fa fa-times">
      {{ trans('layout.button.action.delete') }}
    </i>
  </button>
{!! Form::close() !!}
