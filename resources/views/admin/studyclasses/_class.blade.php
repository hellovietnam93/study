<tr>
  <td>
    <a href="{{ route('admin::class.show', array($class->course_id, $class->id)) }}">
      {{ $class->id }}
    </a>
  </td>
  <td>{{ $class->name }}</td>
  <td>{{ $class->description }}</td>
  <td>{{ $class->type }}</td>
  <td>
    <a href="{{ route('admin::semester.show', $class->semester_id) }}">
      {{ $class->semester_id }}
    </a>
  </td>
  <td>
    <a href="{{ route('admin::class.edit', array($class->course_id, $class->id)) }}">
      {{ trans('layout.button.action.edit') }}
    </a>
    @include('admin.studyclasses._delete')
  </td>
</tr>
