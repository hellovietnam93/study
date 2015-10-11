<tr>
  <td>
    <a href="{{ route('lecturer::class.show', array($course->id, $class->id)) }}">
      {{ $class->id }}
    </a>
  </td>
  <td>{{ $class->name }}</td>
  <td>{{ $class->description }}</td>
  <td>{{ $class->type }}</td>
  <td>{{ $class->semester }}</td>
  <td>
    <a href="{{ route('lecturer::class.edit', array($course->id, $class->id)) }}">
      {{ trans('layout.button.action.edit') }}
    </a>
    @include('lecturer.studyclasses._delete')
  </td>
</tr>
